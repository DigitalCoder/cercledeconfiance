<?php
/**
 * Created by PhpStorm.
 * User: necro
 * Date: 01/06/17
 * Time: 16:28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Connected_object;
use AppBundle\Entity\Model;
use AppBundle\Form\Connected_objectType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\ModelType;
use Symfony\Component\HttpFoundation\Request;


class ConnectedObjectController extends Controller
{
    /**
     * @Route("/test2")
     */
    public function createObjectAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $listOfObjects = $em->getRepository('AppBundle:Connected_object');
        $listOfObjects = $listOfObjects->findAll();

//        $model = $em->getRepository('AppBundle:Model');
//        $model = $model->findAll();

        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("ListObj" => $listOfObjects));
    }
}