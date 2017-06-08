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
    public function editObjectAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $objectWithInfo = $em->getRepository('AppBundle:Object_entry')->findBy(array("circle_user" => $id));
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }

    /**
     * @Route("/cercles/{id}/admin/objets/{objectId}")
     */
    public function activateObjectAction(Request $request, $id, $objectId) {
        $em = $this->getDoctrine()->getManager();
        $objectToActivate = $em->getRepository('AppBundle:Object_entry')->findOneById($objectId);
        if ($objectToActivate->getAccess() == true){

        }
        $objectToActivate->setAccess(!$objectToActivate->getAccess());
        $em->persist($objectToActivate);
        $em->flush();
        // TODO change route for buy;
        // TODO add confirmation for remove;
        return $this->redirect("/cercles/".$id."/admin/objets");
    }
}