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
     * @Route("/cercles/{token}/admin/objets")
     */
    public function editObjectAction(Request $request, $token){

        $em = $this->getDoctrine()->getManager();
        $circleId = $em->getRepository('AppBundle:Circle')->findOneBy(['token'=>$token]);
        $circleUser = $em->getRepository('AppBundle:Circle_user')->findOneBy(['circle'=>$circleId->getId()]);
        $objectWithInfo = $em->getRepository('AppBundle:Object_entry')->findBy(array("circle_user" => $circleUser[1]));
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo));
    }

    /**
     * @Route("/cercles/{token}/admin/objets/{objectId}")
     */
    public function activateObjectAction(Request $request, $token, $objectId) {
        $em = $this->getDoctrine()->getManager();
        $circleId = $em->getRepository('AppBundle:Circle')->findOneBy(['token'=>$token]);
        $circleUser = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$circleId->getId()]);
        $objectToActivate = $em->getRepository('AppBundle:Object_entry')->findBy(['model'=>$objectId, 'circle_user'=>$circleUser]);
        foreach ($objectToActivate as $value){
            $access = $value->getAccess();
            $value->setAccess(!$access);
            $em->persist($value);
            $em->flush();
        }
        // TODO change route for buy;
        // TODO add confirmation for remove;
        return $this->redirect("/cercles/".$token."/admin/objets");
    }
}