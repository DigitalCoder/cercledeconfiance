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

class EditOfferController extends Controller
{
    /**
     * @Route("/cercle/{id}/admin/offres")
     */
    public function editOfferAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $offer = $em->getRepository('AppBundle:Circle');
        $circle = $offer->find($id);
        $form = $this->createForm(CircleType::class, $circle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();

            $em->persist($offer);
            $em->flush();
        }
            return $this->render('FrontBundle:Admin:adminServices.html.twig', array("form" => $form->createView(),
                                                                                        "circle" => $circle));

    }


}