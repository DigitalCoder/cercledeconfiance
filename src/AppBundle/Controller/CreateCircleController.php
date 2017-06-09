<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 30/05/17
 * Time: 11:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Circle_user;
use AppBundle\Form\Circle_userType;
use AppBundle\Form\CircleType;
use AppBundle\Form\User_InvitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Circle;
use Symfony\Component\HttpFoundation\Request;

class CreateCircleController extends Controller
{
    /**
     * @Route("cercles/create")
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
     * @Route("cercles/{id}/invit")
     */
    public function userInvit(Request $request, $id){

        $invit = new Circle_user();

        $form = $this->createForm(User_InvitType::class, $invit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $circle = $em->getRepository('AppBundle:Circle')->findBy(['id'=>$id]);
            $invit->setCircle($circle[0]);
            $invit->setCircleCenter(0);
            $em->persist($invit);
            $em->flush();
            $user = $this->getUser();
            $circle_users = $em->getRepository('AppBundle:Circle_user')->findBy(['user'=>$user->getId()]);
            return $this->render('AppBundle:Default:showCircles.html.twig',
                ['CUsers'=>$circle_users]);
        }
        return $this->render('FrontBundle:Default:createCircle.html.twig', array("form" => $form->createView()));

    }
}