<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cloud;
use AppBundle\Entity\DataApp;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\CircleUser;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("/cercles")
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="accueil")
     */
    public function showCirclesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();


        $circle_users = $em->getRepository('AppBundle:CircleUser')->findBy(['user'=>$user->getId()]);

        return $this->render('AppBundle:Default:showCircles.html.twig',
            ['CUsers' => $circle_users]);
    }

    /**
     * @Route("/create")
     */
    public function createAction()
    {
        return $this->render('FrontBundle:Default:createCircle.html.twig');
    }

    /**
     * @Route("/{token}", name="appli")
     */
    public function accueilAppliAction($token)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $circle = $em->getRepository('AppBundle:Circle')->findOneBy(['token' => $token]);
        $circleUser = $em->getRepository('AppBundle:CircleUser')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);
        $param = ['token' => $token, 'circleUser' => $circleUser];
        return $this->render('AppBundle:Default:accueilAppli.html.twig', $param);
    }

    /**
     * @Route("/{token}/admin", name="admin")
     */
    public function adminCircleAction($token)
    {

        $param = ['token' => $token];
        return $this->render('AppBundle:Default:adminCircle.html.twig', $param);
    }

    /**
     * @Route("/{token}/visio", name="visio")
     */
    public function visioAction($token)
    {
        $param = ['token' => $token];
        return $this->render('AppBundle:Default:visio.html.twig', $param);
    }

    /**
     * @Route("/{token}/cloud", name="cloud")
     */
    public function cloudAction($token, Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $circle = $em->getRepository('AppBundle:Circle')->findOneBy(['token' => $token]);
        $currentCircleUser = $em->getRepository('AppBundle:CircleUser')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);

        if (!isset($currentCircleUser)) {
            return $this->redirectToRoute('accueil');
        }
        if ($currentCircleUser->getCloudAccess() == 0) {
            return $this->render('AppBundle:Default:cloud.html.twig',
                ['token' => $token,
                    'error' => 'Vous n\'avez pas accès à cette fonctionnalité.<br/>Contactez l\'administrateur 
du cercle pour plus d\'informations.']);
        }

        $circleUsers = $em->getRepository('AppBundle:CircleUser')
            ->findBy(['circle' => $circle->getId()]);

        $cloud = new Cloud();
        $dataApp = new DataApp();

        $form = $this->createFormBuilder($cloud)
            ->add('file_name', FileType::class, ['label'=>'Envoyer un fichier'])
            ->add('Envoyer', SubmitType::class)
            ->getForm();

        if (isset($_FILES['form']['type']['file_name'])) {
            $cloud->setFileType($_FILES['form']['type']['file_name']);
        }

        $form->handleRequest($request);
        $dataApp->setCloud($cloud);
        $dataApp->setCircleUser($currentCircleUser);
        $dataApp->setCreationDate(new \DateTime());

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($dataApp);
            $em->persist($cloud);
            $em->flush();
            return $this->redirectToRoute('cloud', ['token' => $token]);
        }

        $param = ['token' => $token, 'CUsers' => $circleUsers, 'form' => $form->createView()];
        return $this->render('AppBundle:Default:cloud.html.twig', $param);
    }
}
