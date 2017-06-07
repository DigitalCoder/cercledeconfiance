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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Circle;
use Symfony\Component\HttpFoundation\Request;

class CreateCircleController extends Controller
{
    /**
     * @Route("circle/create_circle")
     */
    public function createCircle(Request $request){
        $cercle = new Circle_user();
        $form = $this->createForm(Circle_userType::class, $cercle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();

//            $user = $this->getUser();
//            $userId = $user->getId();
//            $cercle->setAdminCircle($userId);


            $em->persist($cercle);
            $em->flush();
//            $centerId = $cercle->getUser();
//            $test = $em->getRepository('AppBundle:circle_user');
//            var_dump($cercle);
//            die();

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
}