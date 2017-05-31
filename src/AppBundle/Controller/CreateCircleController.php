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
     * @Route("/test")
     */
    public function createCircle(Request $request){
        $cercle = new Circle_user();
        $form = $this->createForm(Circle_userType::class, $cercle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $userId = $user->getId();
            $cercle->setAdminCircle($userId);


            $em->persist($cercle);
            $em->flush();
            $centerId = $cercle->getUser()->getId();
//            $test = $em->getRepository('AppBundle:circle_user');
            var_dump($centerId);
            die();
        }
        return $this->render('FrontBundle:Default:test.html.twig', array("form" => $form->createView()));

    }
}