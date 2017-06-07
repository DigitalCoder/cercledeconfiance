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

}
