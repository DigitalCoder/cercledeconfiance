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
     * @Route("/", name="accueil")
     */
    public function showCircles()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $circle_users = $em->getRepository('AppBundle:Circle_user')->findBy(['user' => $user->getId()]);
        return $this->render('AppBundle:Default:showCircles.html.twig',
            ['CUsers' => $circle_users]);
    }

    /**
     * @Route("/create")
     */
    public function createAction()
    {
        return $this->render('FrontBundle:Default:createCircle.html.twig');
    }

    /**
     * @Route("/{token}")
     */
    public function accueilAppliAction($token)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $circle = $em->getRepository('AppBundle:Circle')->findOneBy(['token' => $token]);
        $circleUser = $em->getRepository('AppBundle:Circle_user')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);
        $param = ['token' => $token, 'circleUser' => $circleUser];
        return $this->render('AppBundle:Default:accueilAppli.html.twig', $param);
    }

    /**
     * @Route("/{token}/admin", name="admin")
     */
    public function adminCircleAction($token)
    {

        $param = ['token' => $token];
        return $this->render('AppBundle:Default:adminCircle.html.twig', $param);
    }
}
