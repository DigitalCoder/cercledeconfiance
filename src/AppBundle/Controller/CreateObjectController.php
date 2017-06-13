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
     * @Route("/cercles/{id}/admin/objets")
     */
    public function editObjectAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$id]);
        dump($circleUser[1]);die();
        $objectWithInfo = $em->getRepository('AppBundle:Object_entry')->findBy(array("circle_user" => $circleUser[1]));

        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }

    /**
     * @Route("/cercles/{id}/admin/objets/{objectId}")
     */
    public function activateObjectAction(Request $request, $id, $objectId) {
        $em = $this->getDoctrine()->getManager();

        $circleuser = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$id]);
        $objectToActivate = $em->getRepository('AppBundle:Object_entry')->findBy(['model'=>$objectId, 'circle_user'=>$circleuser]);
        foreach ($objectToActivate as $value){
            $access = $value->getAccess();
            $value->setAccess(!$access);
            $em->persist($value);
            $em->flush();
        }
        // TODO change route for buy;
        // TODO add confirmation for remove;
        return $this->redirect("/cercles/".$id."/admin/objets");
    }
}