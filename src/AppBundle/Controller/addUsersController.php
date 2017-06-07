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



class addUsersController extends Controller
{
    /**
     * @Route("circle/add_users/{id}")
     */
    public function addUsersAction()
    {

    }

    /**
     * @Route("circle/list_users/{id}")
     */
    public function listUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $circleId = 6;
        $circle_users = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$circleId]);

        var_dump($circle_users);
        die();
        foreach ($circle_users as $test){
        $users[$test->getUser()->getId()]['name'] = $test->getUser()->getName();
        $users[$test->getUser()->getId()]['firstname'] = $test->getUser()->getFirstname();
        $users[$test->getUser()->getId()]['visio'] = $test->getCallAccess();
        $users[$test->getUser()->getId()]['wall'] = $test->getWallAccess();
        $users[$test->getUser()->getId()]['cloud'] = $test->getCloudAccess();
        $users[$test->getUser()->getId()]['agenda'] = $test->getAgendaAccess();
        }

//                var_dump($users);
//        die();

        return $this->render('AppBundle:Default:listUsersInCircle.html.twig', ['users'=>$users]);
    }
}