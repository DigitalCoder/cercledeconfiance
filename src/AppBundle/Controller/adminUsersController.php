<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 06/06/17
 * Time: 17:36
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Circle_user;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;



class adminUsersController extends Controller
{

    /**
     * @Route("cercles/{idCircle}/admin/membres")
     */
    public function listUsersAction(Request $request)
    {
        $mail = new User();

        $form = $this->createFormBuilder($mail)
            ->add('email', EmailType::class)
            ->getForm();

        $em = $this->getDoctrine()->getManager();
        $circleId = 11;
        $users = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$circleId]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

//        $message = new \Swift_Message('Invitation Cercle Confiance');
//        $message->setFrom('send@example.com')
//                ->setTo($request->request->get('email'))
//            ->setBody(
//                $this->renderView(
//                // app/Resources/views/Emails/registration.html.twig
//                    'Emails/registration.html.twig',
//                    array('name' => $name)
//                ),
//                'text/html'
//            );
//
//        $mailer->send($message);
//        return $this->render('FrontBundle:Admin:adminUsers.html.twig', ['users'=>$users, "form" => $form->createView()]);

        }

        return $this->render('FrontBundle:Admin:adminUsers.html.twig', ['users'=>$users, "form" => $form->createView()]);
    }


    /**
     * @Route("circle/edit_user_access/{id}")
     */
    public function editUsersAccessAction()
    {

        return $this->render('FrontBundle:Admin:users:editUserAccess.html.twig');
    }

}