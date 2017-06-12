<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 06/06/17
 * Time: 17:36
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\Circle_userType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Circle_user;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;



class adminUsersController extends Controller
{

    /**
     * @Route("cercles/{id}/admin/membres", name="listMembers")
     */
    public function listUsersAction(Request $request, $id)
    {
        $mail = new User();

        $form = $this->createFormBuilder($mail)
            ->add('email', EmailType::class)
            ->add('name', TextType::class)
            ->add('envoyer', SubmitType::class);

        $form = $form->getForm();

        $em = $this->getDoctrine()->getManager();
        $circleId = $id;
        $users = $em->getRepository('AppBundle:Circle_user')->findBy(['circle'=>$circleId]);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $mailer = $this->get('mailer');
            $message = new \Swift_Message('Invitation Cercle Confiance');
            $message->setTo($mail->getEmail())
            ->setFrom('cercleconfiance07@gmail.com')
            ->setBody($this->renderView('invitation.html.twig', array('name' => $mail->getName(), 'id'=>$id)), 'text/html');

//            $this->renderView('Emails/invitation.html.twig', array('name' => $mail->getName())), 'text/html'


        $mailer->send($message);
        return $this->render('FrontBundle:Admin:adminUsers.html.twig', ['users'=>$users, 'id'=>$id, "form" => $form->createView()]);

        }

        return $this->render('FrontBundle:Admin:adminUsers.html.twig', ['users'=>$users, 'id'=>$id, "form" => $form->createView()]);
    }


    /**
     * @Route("cercles/{id}/admin/membres/{idUser}")
     */
    public function editUsersAccessAction($id, $idUser, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:Circle_user')->findBy(['id'=>$idUser]);

        $formBuilder = $this->createFormBuilder($circleUser);

        $formBuilder->add('callAccess')
                    ->add('wallAccess')
                    ->add('cloudAccess')
                    ->add('agendaAccess')
                    ->add('add', SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('listMembers', ['id'=>$id]);
        }

        return $this->render('FrontBundle:Admin:editUserAccess.html.twig', [
            'form' => $form->createView(),
            'user' => $circleUser,
            'id'=>$id,
        ]);
    }

    /**
     * @Route("cercles/{id}/admin/membres/{idUser}/delete", name="deleteMember")
     *
     */
    public function deleteAction($idUser, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:Circle_user')->findBy(['id'=>$idUser]);
        $em->remove($circleUser[0]);

        $em->flush();

        return $this->redirectToRoute('listMembers', ['id'=>$id]);
    }

}