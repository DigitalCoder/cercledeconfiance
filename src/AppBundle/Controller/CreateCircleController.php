<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 30/05/17
 * Time: 11:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Circle_user;
use AppBundle\Entity\Object_entry;
use AppBundle\Form\Circle_userType;
use AppBundle\Form\CircleType;
use AppBundle\Form\Object_entryType;
use AppBundle\Form\User_InvitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Circle;
use Symfony\Component\HttpFoundation\Request;

class CreateCircleController extends Controller
{


    /**
     * @Route("cercles/creer")
     */
    public function createCircle(Request $request){
        $cercle = new Circle_user();
        $form = $this->createForm(Circle_userType::class, $cercle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($cercle);
            $em->flush();

            $idCercle=$cercle->getCircle();

            $adminCircle = new Circle_user();
            $adminCircle->setUser($this->getUser());
            $adminCircle->setCircle($idCercle);
            $adminCircle->setAdminCircle(1);
            $adminCircle->setCircleCenter(0);
            $adminCircle->setCallAccess(1);
            $adminCircle->setWallAccess(1);
            $adminCircle->setAgendaAccess(1);
            $adminCircle->setCloudAccess(1);

            $em->persist($adminCircle);
            $em->flush();
        }

        return $this->render('FrontBundle:Default:createCircle.html.twig', array("form" => $form->createView()));
    }

    /**
     * @Route("{id}/invit")
     */
    public function userInvit(Request $request, $id){

        $invit = new Circle_user();

        $form = $this->createForm(User_InvitType::class, $invit);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $circleUsers = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$id]);

        if (isset($circleUsers) && count($circleUsers) >=6 ) {
            return $this->render('FrontBundle:Admin:invitUser.html.twig', array('error' => 'Le nombre maximal d\'utilisateurs pour ce cercle est atteint', "form" => $form->createView()));
        }

        if ($form->isSubmitted() && $form->isValid()) {

            $circle = $em->getRepository('AppBundle:Circle')->findBy(['id'=>$id]);
            $invit->setCircle($circle[0]);
            $invit->setCircleCenter(0);
            $invit->getUser()->setEnabled(true);
            $em->persist($invit);
            $em->flush();


            $circle_users = $em->getRepository('AppBundle:Circle_user')->findBy(['user'=>$invit->getUser()->getId()]);
            return $this->redirectToRoute('accueil', ['CUsers'=>$circle_users]);
        }
        return $this->render('FrontBundle:Admin:invitUser.html.twig', array("form" => $form->createView()));

    }
}