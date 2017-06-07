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
     * @Route("/admin/objets")
     */
    public function adminObjetsAction()
    {
        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('FrontBundle:Admin:adminObjets.html.twig');
        }
        $error = "Erreur!";
        $param = ['error'=>$error];
        return $this->render('FrontBundle:Default:index.html.twig', $param);
    }

    /**
     * @Route("/admin/services")
     */
    public function adminServicesAction()
    {
        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('FrontBundle:Admin:adminServices.html.twig');
        }
        $error = "Erreur!";
        $param = ['error'=>$error];
        return $this->render('FrontBundle:Default:index.html.twig', $param);
    }

    /**
     * @Route("/admin/users")
     */
    public function adminUsersAction()
    {
        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('FrontBundle:Admin:adminUsers.html.twig');
        }
        $error = "Erreur!";
        $param = ['error'=>$error];
        return $this->render('FrontBundle:Default:index.html.twig', $param);
    }

    /**
     * @Route("/cercles/{id}")
     */
    public function accueilAppliAction($id)
    {
        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('FrontBundle:Admin:adminUsers.html.twig');
        }
        $error = "Erreur!";
        $param = ['error'=>$error, 'id'=>$id];
        return $this->render('FrontBundle:Default:index.html.twig', $param);
    }
}
