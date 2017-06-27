<?php
/**
 * Created by PhpStorm.
 * User: necro
 * Date: 01/06/17
 * Time: 16:28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Circle_user;
use AppBundle\Entity\Data_app;
use AppBundle\Entity\Wall;
use AppBundle\Form\Circle_userType;
use AppBundle\Form\Data_appType;
use AppBundle\Form\WallType;
use Doctrine\Tests\Common\DataFixtures\TestEntity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;


class WallController extends Controller
{
    /**
     * @Route("/cercles/{token}/mur")
     */
    public function showWallAction(Request $request, $token){

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

        $wall = new Wall();
        $form = $this->createForm(WallType::class, $wall);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $circle = $em->getRepository('AppBundle:Circle')->findOneBy(['token' => $token]);
            $currentCircleUser = $em->getRepository('AppBundle:Circle_User')->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);

            $message = $form->getData()->getContent();

            $wall = new Wall();
            $wall->setContent($message);

            $formContent = new Data_app();
            $formContent->setWall($wall);
            $formContent->setCreationDate(new \DateTime('now'));
            $formContent->setCircleUser($currentCircleUser);
            $formContent->setAgenda(null);
            $formContent->setCloud(null);

            $em->persist($formContent);
            $em->flush();
        }

        return $this->render('FrontBundle:Default:wall.html.twig', array(
            'walldatas'=>$dataApps,
            'form'=>$form->createView()
        ));

    }
}