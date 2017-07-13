<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 30/05/17
 * Time: 11:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\CircleUser;
use AppBundle\Entity\Model;
use AppBundle\Entity\ObjectEntry;
use AppBundle\Form\CircleUserType;
use AppBundle\Form\CircleType;
use AppBundle\Form\ObjectEntryType;
use AppBundle\Form\UserInvitType;
use AppBundle\Services\ModelSetter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Circle;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class CreateCircleController extends Controller
{


    /**
     * @Route("cercles/creer", name="create")
     */


    public function createCircleAction(Request $request, ModelSetter $modelSetter)
    {
        $user = $this->getUser();
        $cercle = new CircleUser();
        $form = $this->createForm(CircleUserType::class, $cercle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $cercle->getCircle()->setToken(md5(uniqid()));
            $em->persist($cercle);
            $em->flush();

            $idCercle = $cercle->getCircle();
            $centre = $cercle->getUser();
            $centre->setEnabled(true);
            $em->persist($centre);

            $adminCircle = new CircleUser();
            $adminCircle->setUser($user);
            $adminCircle->setCircle($idCercle);
            $adminCircle->setAdminCircle(1);
            $adminCircle->setCircleCenter(0);
            $adminCircle->setCallAccess(1);
            $adminCircle->setWallAccess(1);
            $adminCircle->setAgendaAccess(1);
            $adminCircle->setCloudAccess(1);
            $em->persist($adminCircle);
            $em->flush();

            $models = $modelSetter->setModels($em);
            $CUsers = $em->getRepository('AppBundle:CircleUser')->findBy(['circle' => $idCercle]);
            foreach ($CUsers as $CUser) {
                foreach ($models as $model) {
                    $objectEntry = new ObjectEntry();
                    $objectEntry->setCircleUser($CUser);
                    $objectEntry->setModel($model);
                    $objectEntry->setAccess(1);
                    $em->persist($objectEntry);
                    $em->flush();
                }
            }

            return $this->redirectToRoute('accueil');
        }
        return $this->render('FrontBundle:Default:createCircle.html.twig', array("form" => $form->createView()));
    }

    /**
     * @Route("cercles/creer/centreAdmin", name="centreAdmin")
     */

    public function createCenterAdminAction (Request $request, ModelSetter $modelSetter)
    {
        $cercle = new Circle();
        $form = $this->createForm(CircleType::class, $cercle);
        $form->add('save', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $cercle->setToken(md5(uniqid()));
            $em->persist($cercle);
            $em->flush();


            $idCercle = $em->getRepository('AppBundle:Circle')->findOneBy(['id'=>$cercle->getId()]);

            $centerCircle = new CircleUser();
            $centerCircle->setUser($this->getUser());
            $centerCircle->setCircle($idCercle);
            $centerCircle->setAdminCircle(1);
            $centerCircle->setCircleCenter(1);
            $centerCircle->setCallAccess(1);
            $centerCircle->setWallAccess(1);
            $centerCircle->setAgendaAccess(1);
            $centerCircle->setCloudAccess(1);

            $em->persist($centerCircle);
            $em->flush();

            $models = $modelSetter->setModels($em);
            foreach ($models as $model) {
                $objectEntry = new ObjectEntry();
                $objectEntry->setCircleUser($centerCircle);
                $objectEntry->setModel($model);
                $objectEntry->setAccess(1);
                $em->persist($objectEntry);
                $em->flush();
            }

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $circle_users = $em->getRepository('AppBundle:CircleUser')->findBy(['user'=>$user->getId()]);

            return $this->render('AppBundle:Default:showCircles.html.twig',
                ['CUsers' => $circle_users, 'circleUser'=>$user]);
        }

        return $this->render('FrontBundle:Default:centerAdmin.html.twig', array("form" => $form->createView()));
    }

    /**
     * @Route("{token}/invit")
     */

    public function userInvitAction(Request $request, Circle $circle, ModelSetter $modelSetter)
    {


        $invit = new CircleUser();

        $form = $this->createForm(UserInvitType::class, $invit);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        $circleId = $em->getRepository('AppBundle:Circle')->findBy(['token' => $circle->getToken()]);
        $circleId = $circleId[0]->getId();
        $circleUsers = $em->getRepository('AppBundle:CircleUser')->findBy(['circle' => $circleId]);


        if (isset($circleUsers) && count($circleUsers) >= $this->getParameter('number_circle_users')) {
            return $this->render('FrontBundle:Admin:invitUser.html.twig', array('error' => 'Le nombre maximal d\'utilisateurs pour ce cercle est atteint', "form" => $form->createView()));
        }

        if ($form->isSubmitted() && $form->isValid()) {

            $invit->setCircle($circle);
            $invit->setCircleCenter(0);
            $invit->getUser()->setEnabled(true);
            $em->persist($invit);
            $em->flush();

            $models = $modelSetter->setModels($em);
            foreach ($models as $model) {
                $objectEntry = new ObjectEntry();
                $objectEntry->setCircleUser($invit);
                $objectEntry->setModel($model);
                $objectEntry->setAccess(0);
                $em->persist($objectEntry);
                $em->flush();
            }

            $admin = $em->getRepository('AppBundle:CircleUser')->findOneBy(['circle' => $circleId, 'adminCircle' => 1]);
            $mailer = $this->get('mailer');
            $message = new \Swift_Message('Nouvel utilisateur Cercle Confiance');
            $message->setTo($admin->getUser()->getEmail())
                ->setFrom($this->getParameter('mailer_user'))
                ->setBody($this->renderView('confirmation.html.twig', array('adminName' => $admin->getUser()->getUsername(), 'invitName' => $invit->getUser()->getUsername())), 'text/html');
            $mailer->send($message);


            $circle_users = $em->getRepository('AppBundle:CircleUser')->findBy(['user' => $invit->getId()]);
            return $this->redirectToRoute('accueil',
                ['CUsers' => $circle_users]);

        }
        return $this->render('FrontBundle:Admin:invitUser.html.twig', array("form" => $form->createView()));

    }
}