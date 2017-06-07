<?php
/**
 * Created by PhpStorm.
 * User: necro
 * Date: 01/06/17
 * Time: 16:28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Connected_object;
use Doctrine\Tests\Common\DataFixtures\TestEntity\User;
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

        //$currentUser = $this->getUser();
        $currentCircle = 37;

        $em = $this->getDoctrine()->getManager();
//        $circleUser = $em->getRepository('AppBundle:Object_entry')->findBy(array("circle_user" => $currentCircle));
//        $objectsId = array();
//        foreach ($circleUser as $objId){
//            $objectsId[] = $objId->getTypeObject()->getId();
//        }
//        $objectWithInfo = array();
//        foreach ($objectsId as $id){
//            $objectWithInfo[] = $em->getRepository('AppBundle:Model')->findOneBy(array("type_object" => $id));
//        }
        $objectWithInfo = $em->getRepository('AppBundle:Model')->findAll();

        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }
}