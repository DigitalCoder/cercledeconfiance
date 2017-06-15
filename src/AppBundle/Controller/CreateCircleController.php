<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 30/05/17
 * Time: 11:37
 */

namespace AppBundle\Controller;

use AppBundle\Entity\CircleUser;
use AppBundle\Entity\ObjectEntry;
use AppBundle\Form\CircleUserType;
use AppBundle\Form\CircleType;
use AppBundle\Form\ObjectEntryType;
use AppBundle\Form\UserInvitType;
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
        $cercle = new CircleUser();
        $form = $this->createForm(CircleUserType::class, $cercle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($cercle);
            $em->flush();

            $idCercle=$cercle->getCircle();

            $adminCircle = new CircleUser();
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

        $invit = new CircleUser();

        $form = $this->createForm(UserInvitType::class, $invit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $circle = $em->getRepository('AppBundle:Circle')->findBy(['id'=>$id]);
            $invit->setCircle($circle[0]);
            $invit->setCircleCenter(0);
            $em->persist($invit);
            $em->flush();

            $circle_users = $em->getRepository('AppBundle:CircleUser')->findBy(['user'=>$invit->getId()]);
            return $this->render('AppBundle:Default:showCircles.html.twig',
                ['CUsers'=>$circle_users]);
        }
        return $this->render('FrontBundle:Default:createCircle.html.twig', array("form" => $form->createView()));

    }
}