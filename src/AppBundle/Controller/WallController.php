<?php
/**
 * Created by PhpStorm.
 * User: necro
 * Date: 01/06/17
 * Time: 16:28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Circle;
use AppBundle\Entity\DataApp;
use AppBundle\Entity\Wall;
use AppBundle\Form\CircleUserType;
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
     * @Route("/cercles/{token}/mur", name="mur")
     */
    public function showWallAction(Request $request, Circle $circle){

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $currentCircleUser = $em->getRepository('AppBundle:CircleUser')->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);
        $wallCircleDatas = $em->getRepository('AppBundle:CircleUser')->findBy(['circle'=>$circle->getId()]);

        $circleUserId = array();
        foreach ($wallCircleDatas as $user) {
                $circleUserId[] = $user->getId();
        }
        $dataApps = $em->getRepository('AppBundle:DataApp')->findBy(['circleUser'=>$circleUserId],['creationDate'=>'DESC']);
        $dataContent = array();
        foreach ($dataApps as $content) {
            if ($content->getWall() != null) {
                $dataContent['wall'][] = $content->getWall()->getContent();
            }
            if ($content->getAgenda() != null) {
                $dataContent['agenda'][] = $content->getAgenda();
            }
            if ($content->getCloud() != null) {
                $dataContent['cloud'][] = $content->getCloud();
            }
        }

        $wall = new Wall();
        $wall->setContent(null);
        $form = $this->createForm(WallType::class, $wall);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $message = $form->getData()->getContent();

            $wall = new Wall();
            $wall->setContent($message);

            $formContent = new DataApp();
            $formContent->setWall($wall);
            $formContent->setCreationDate(new \DateTime('now'));
            $formContent->setCircleUser($currentCircleUser);
            $formContent->setAgenda(null);
            $formContent->setCloud(null);

            $em->persist($formContent);
            $em->flush();
            return $this->redirectToRoute('wall', ['token'=>$circle->getToken()]);
        }

        return $this->render('FrontBundle:Default:wall.html.twig', array(
            'walldatas'=>$dataApps,
            'form'=>$form->createView()
        ));

    }
}