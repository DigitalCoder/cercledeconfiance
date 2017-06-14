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


class WallController extends Controller
{
    /**
     * @Route("/cercles/{token}/mur")
     */
    public function editObjectAction(Request $request, $token){
        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:Circle')->findOneBy(['token'=>$token]);
        $wallCircleDatas = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$circleUser->getId()]);
        $circleUserId = array();
        foreach ($wallCircleDatas as $user) {
                $circleUserId[] = $user->getId();
        }
        $dataApps = $em->getRepository('AppBundle:Data_app')->findBy(['circle_user'=>$circleUserId],['creationDate'=>'DESC']);
        $dataContent = array();
        foreach ($dataApps as $content) {
            if ($content->getWall() != null) {
                $dataContent[] = $content->getWall()->getContent();
            }
        }

        return $this->render('FrontBundle:Default:wall.html.twig',array('walldatas'=>$dataApps));
    }
}