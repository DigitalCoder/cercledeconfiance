<?php
/**
 * Created by PhpStorm.
 * User: malik
 * Date: 02/06/17
 * Time: 11:06
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Circle;
use AppBundle\Entity\Offer;
use AppBundle\Form\CircleType;
use AppBundle\Form\OfferType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class EditOfferController extends Controller
{
    /**
     * @Route("/cercles/{token}/admin/offres", name="edit_offer")
    *
     */
    public function editOfferAction(Request $request, $token)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $circle = $em->getRepository('AppBundle:Circle')->findOneBy(['token' => $token]);
        $circleUser = $em->getRepository('AppBundle:CircleUser')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);
        $form = $this->createForm(CircleType::class, $circle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($circle);
            $em->flush();
            return $this->redirectToRoute('admin', ['token'=>$token, 'circleUser'=>$circleUser] );

        }

            return $this->render('FrontBundle:Admin:adminServices.html.twig',
                        array("form" => $form->createView(), 'token'=>$token, 'circleUser'=>$circleUser));

    }

    /**
     * @Route("cercles/{token}/admin/offres/delete", name="deleteCircle")
     *
     */
    public function deleteAction($token)
    {
        $em = $this->getDoctrine()->getManager();
        $circle = $em->getRepository('AppBundle:Circle')->findOneBy(['token'=>$token]);
        $circle->setActive(0);
        $circle->setAvailabilityDate(new \DateTime());
        $em->persist($circle);
        $em->flush();

        return $this->redirectToRoute('accueil');
    }

}