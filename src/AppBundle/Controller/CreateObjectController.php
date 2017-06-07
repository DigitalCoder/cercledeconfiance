<?php
/**
 * Created by PhpStorm.
 * User: necro
 * Date: 01/06/17
 * Time: 16:28
 */

namespace AppBundle\Controller;

use Doctrine\Tests\Common\DataFixtures\TestEntity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\ModelType;
use Symfony\Component\HttpFoundation\Request;


class CreateObjectController extends Controller
{
    /**
     * @Route("/objets")
     */
    public function createObjectAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $objectWithInfo = $em->getRepository('AppBundle:Model')->findAll();
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }

    /**
     * @Route("/cercles/{id}/admin/objets")
     */
    public function editObjectAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $userId = $em->getRepository('AppBundle:Circle_user')->findBy(array("user" => $this->getUser()));
        $circleID = "????? $this->getUser()";

        //dump($users);die();

        $objectWithInfo = $em->getRepository('AppBundle:Model')->findAll();
        // TODO add function buyItem() add function EditItem();
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }
}