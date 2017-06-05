<?php
/**
 * Created by PhpStorm.
 * User: necro
 * Date: 01/06/17
 * Time: 16:28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Connected_object;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Model;
use AppBundle\Form\ModelType;
use Symfony\Component\HttpFoundation\Request;


class CreateModelController extends Controller
{
    /**
     * @Route("/test2")
     */
    public function createModelAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $objects = $em->getRepository('AppBundle:Connected_object')->findAll();
//        var_dump($objects);die();
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objects));
    }
}