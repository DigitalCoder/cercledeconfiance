<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

    /**
     * @Route("/services")
     */
    public function serviceAction()
    {
        return $this->render('FrontBundle:Default:services.html.twig');
    }

    /**
     * @Route("/presentation")
     */
    public function quiSommesNousAction()
    {
        return $this->render('FrontBundle:Default:quisommesnous.html.twig');
    }

    /**
     * @Route("/objets")
     */
    public function objetsAction()
    {
        return $this->render('FrontBundle:Default:objets.html.twig');
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
        } else {
            $error = "Erreur!";
            $param = ['error'=>$error];
            return $this->render('FrontBundle:Default:index.html.twig', $param);
        }
    }

    /**
     * @Route("/admin/services")
     */
    public function adminServicesAction()
    {
        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('FrontBundle:Admin:adminServices.html.twig');
        } else {
            $error = "Erreur!";
            $param = ['error'=>$error];
            return $this->render('FrontBundle:Default:index.html.twig', $param);
        }
    }

    /**
     * @Route("/admin/users")
     */
    public function adminUsersAction()
    {
        if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('FrontBundle:Admin:adminUsers.html.twig');
        } else {
            $error = "Erreur!";
            $param = ['error'=>$error];
            return $this->render('FrontBundle:Default:index.html.twig', $param);
        }
    }
}
