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
     * @Route("/showobj")
     */
    public function createObjectAction(Request $request){

        //$currentUser = $this->getUser();
        $currentCircle = 37;
        $em = $this->getDoctrine()->getManager();
        $objectWithInfo = $em->getRepository('AppBundle:Model')->findAll();
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }

    /**
     * @Route("/editobj")
     */
    public function editObjectAction(Request $request){

        // GET circle_ID
        //$currentUser = $this->getUser();
        $user_id = 37;

        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:Object_entry')->findBy(array("circle_user" => $user_id));
        $objectsId = array();
        foreach ($circleUser as $objId){
            $objectsId[] = $objId->getTypeObject()->getId();
        }
        $objectWithInfo = array();
        foreach ($objectsId as $id){
            $objectWithInfo[] = $em->getRepository('AppBundle:Model')->findOneBy(array("type_object" => $id));
        }
        dump($objectWithInfo);die();

        $objectWithInfo = $em->getRepository('AppBundle:Model')->findAll();
        // TODO add function buyItem() add function EditItem();
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }
}