<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/show_circles")
     */
    public function showCircles()
    {
        return $this->render('AppBundle:Default:showCircles.html.twig');
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
}
