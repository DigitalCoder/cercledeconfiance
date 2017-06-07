<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 06/06/17
 * Time: 17:36
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Circle_user;
use UserBundle\Entity\User;



class adminUsersController extends Controller
{

    /**
     * @Route("circles/list_users/{id}")
     */
    public function listUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $circleId = 11;
        $users = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$circleId]);


        return $this->render('FrontBundle:Admin:adminUsers.html.twig', ['users'=>$users]);
    }

    /**
     * @Route("circle/add_users/{id}")
     */
    public function addUsersAction()
    {


        return $this->render('FrontBundle:Admin:users:addUser.html.twig');


    }

    /**
     * @Route("circle/edit_user_access/{id}")
     */
    public function editUsersAccessAction()
    {


        return $this->render('FrontBundle:Admin:users:editUserAccess.html.twig');


    }

}