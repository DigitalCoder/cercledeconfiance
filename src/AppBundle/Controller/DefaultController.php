<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Circle_user;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("/cercles")
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/")
     */
    public function showCircles()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $circle_users = $em->getRepository('AppBundle:Circle_user')->findBy(['user'=>$user->getId()]);
        return $this->render('AppBundle:Default:showCircles.html.twig',
            ['CUsers'=>$circle_users]);
    }

    /**
     * @Route("/create")
     */
    public function createAction()
    {
        return $this->render('FrontBundle:Default:createCircle.html.twig');
    }

    /**
     * @Route("/{id}")
     */
    public function accueilAppliAction($id)
    {
//        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
//            return $this->render('FrontBundle:Admin:adminUsers.html.twig');
//        }
//        $error = "Erreur!";
        $param = ['id'=>$id];
        return $this->render('AppBundle:Default:accueilAppli.html.twig', $param);
    }

    /**
     * @Route("/{id}/admin")
     */
    public function adminCircleAction($id)
    {
//        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
//            return $this->render('FrontBundle:Admin:adminUsers.html.twig');
//        }
//        $error = "Erreur!";
        $param = ['id'=>$id];
        return $this->render('AppBundle:Default:adminCircle.html.twig', $param);
    }
}
