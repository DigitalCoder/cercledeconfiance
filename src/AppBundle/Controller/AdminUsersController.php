<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 06/06/17
 * Time: 17:36
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\Circle_userType;
use AppBundle\Form\ObjectAccessType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Circle_user;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;
use AppBundle\Form\ObjectAccessTypeType;



class AdminUsersController extends Controller
{

    /**
     * @Route("cercles/{token}/admin/membres", name="listMembers")
     */
    public function listUsersAction(Request $request, $token)
    {
        $userToinvite = new User();

        $form = $this->createFormBuilder($userToinvite)
            ->add('email', EmailType::class)
            ->add('name', TextType::class)
            ->add('envoyer', SubmitType::class, array(
                    'attr' => array('class' => 'btn btn-default btn-submit-resize')));

        $form = $form->getForm();

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $circleToken = $em->getRepository('AppBundle:Circle')->findOneBy(['token'=>$token]);
        $circleId = $circleToken->getId();
        $users = $em->getRepository('AppBundle:CircleUser')->findBy(['circle'=>$circleId]);
        $objects = $em->getRepository('AppBundle:ObjectEntry')->findBy(['circleUser'=>$users]);
        $currentCircleUser = $em->getRepository('AppBundle:CircleUser')->findOneBy(['user' => $user->getId(), 'circle' => $circleId]);

        $form->handleRequest($request);

        $userAdmin = null;
        $userCenter = null;
        $userOther = null;

        foreach($users as $user){
            if(true == $user->getAdminCircle()){
                $userAdmin = $user;
            }
            elseif(true == $user->getCircleCenter()){
                $userCenter = $user;
            }else{
                $userOther[] = $user;
            }
        }
        $usersWithAdminFirst[] = $userAdmin;
        $usersWithAdminFirst[] = $userCenter;
        foreach ($userOther as $user) {
            $usersWithAdminFirst[] = $user;
        }
        $usersWithAdminFirst[0]->getUser()->setFirstname($usersWithAdminFirst[0]->getUser()->getFirstname().' (Admin)');
        $usersWithAdminFirst[1]->getUser()->setFirstname($usersWithAdminFirst[1]->getUser()->getFirstname().' (centre)');

        if ($form->isSubmitted() && $form->isValid()) {
            $mailer = $this->get('mailer');
            $message = new \Swift_Message('Invitation Cercle Confiance');
            $message->setTo($userToinvite->getEmail())
            ->setFrom($this->getParameter('mailer_user'))
            ->setBody($this->renderView('invitation.html.twig', array('name' => $userToinvite->getName(), 'token'=>$token)), 'text/html');

        $mailer->send($message);
        return $this->render('FrontBundle:Admin:adminUsers.html.twig', ['users'=>$usersWithAdminFirst, 'token'=>$token, "form" => $form->createView(), 'objects'=>$objects, 'circleUser'=>$currentCircleUser]);
        }
        return $this->render('FrontBundle:Admin:adminUsers.html.twig', ['users'=>$usersWithAdminFirst, 'token'=>$token, "form" => $form->createView(), 'objects'=>$objects, 'circleUser'=>$currentCircleUser]);
    }


    /**
     * @Route("cercles/{token}/admin/membres/{idUser}", name="editMember")
     */
    public function editUsersAccessAction($token, $idUser, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:CircleUser')->findBy(['id'=>$idUser]);
        $circleUser = $circleUser[0];
        $objects = $em->getRepository('AppBundle:ObjectEntry')->findBy(array("circleUser" => $circleUser));

        $userAccess = [];
        $formBuilder = $this->createFormBuilder($userAccess);


        $formBuilder->add('callAccess', ChoiceType::class, array('choices' => array('Autoriser l\'acces'=>true, 'Refuser l\'acces'=>false), 'data' => $circleUser->getCallAccess()))
                    ->add('wallAccess', ChoiceType::class, array('choices' => array('Autoriser l\'acces'=>true, 'Refuser l\'acces'=>false), 'data' => $circleUser->getWallAccess()))
                    ->add('cloudAccess', ChoiceType::class, array('choices' => array('Autoriser l\'acces'=>true, 'Refuser l\'acces'=>false), 'data' => $circleUser->getCloudAccess()))
                    ->add('agendaAccess', ChoiceType::class, array('choices' => array('Autoriser l\'acces'=>true, 'Refuser l\'acces'=>false), 'data' => $circleUser->getAgendaAccess()))
                ;

                    foreach ($objects as $object){
                        $formBuilder->add(''.$object->getModel()->getReference().'Access', ChoiceType::class, array('choices' => array('Autoriser l\'acces'=>true, 'Refuser l\'acces'=>false), 'data' => $object->getAccess()));
                    }
                ;

        $formBuilder->add('add', SubmitType::class);


        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $circleUser->setCallAccess($form->getData()['callAccess']);
            $circleUser->setWallAccess($form->getData()['wallAccess']);
            $circleUser->setCloudAccess($form->getData()['cloudAccess']);
            $circleUser->setAgendaAccess($form->getData()['agendaAccess']);

            foreach ($objects as $object){

                $fct = ''.$object->getModel()->getReference().'Access';
                $object->setAccess($form->getData()[$fct]);
                $em->persist($object);

            }

            $em->persist($circleUser);
            $em->flush();
            return $this->redirectToRoute('listMembers', ['token'=>$token]);
        }

        return $this->render('FrontBundle:Admin:editUserAccess.html.twig', [
            'form' => $form->createView(),
            'user' => $circleUser,
            'token'=>$token,
        ]);
    }

    /**
     * @Route("cercles/{token}/admin/membres/{idUser}/delete", name="deleteMember")
     *
     */
    public function deleteAction($idUser, $token)
    {
        $em = $this->getDoctrine()->getManager();

        $circleUser = $em->getRepository('AppBundle:CircleUser')->findOneBy(['id'=>$idUser]);
        $data = $em->getRepository('AppBundle:DataApp')->findBy(['circleUser'=>$idUser]);

        if ($data != null) {

            $circleToken = $em->getRepository('AppBundle:Circle')->findOneBy(['token'=>$token]);
            $circleId = $circleToken->getId();

            $admin = $em->getRepository('AppBundle:CircleUser')->findOneBy(['circle'=>$circleId, 'adminCircle'=>1]);

            $data = $em->getRepository('AppBundle:DataApp')->findOneBy(['circleUser'=>$idUser]);
            $newData = $data->setCircleUser($admin);
            $em->persist($newData);

        }

        $em->remove($circleUser);
        $em->flush();

        return $this->redirectToRoute('listMembers', ['token'=>$token]);
    }

}