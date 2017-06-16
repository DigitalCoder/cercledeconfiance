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
        $circleUser = $em->getRepository('AppBundle:CircleUser')->findBy(['circle'=>$circleId->getId()]);
        $objectWithInfo = $em->getRepository('AppBundle:ObjectEntry')->findBy(array("circleUser" => $circleUser[1]));
        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo, 'token' => $token
        ));
    }

    /**
     * @Route("/cercles/{token}/admin/objets/{objectId}")
     */
    public function activateObjectAction(Request $request, $token, $objectId) {
        $em = $this->getDoctrine()->getManager();

        $circleId = $em->getRepository('AppBundle:Circle')->findOneBy(['token'=>$token]);
        $circleUser = $em->getRepository('AppBundle:CircleUser')->findBy(['circle'=>$circleId->getId()]);
        $objectToActivate = $em->getRepository('AppBundle:ObjectEntry')->findBy(['model'=>$objectId, 'circleUser'=>$circleUser]);
        foreach ($objectToActivate as $value) {
            $access = $value->getAccess();
            $value->setAccess(!$access);
            $em->persist($value);
            $em->flush();
        }
        $user = $this->getUser();
        $circleUser = $em->getRepository('AppBundle:CircleUser')->findBy(['user'=>$user, 'circle'=>$circleId]);
        $objectWithInfo = $em->getRepository('AppBundle:ObjectEntry')->findBy(array("circleUser" => $circleUser));

        return $this->render('FrontBundle:Admin:adminObjets.html.twig', array("objects" => $objectWithInfo, 'token' => $token));
    }
}