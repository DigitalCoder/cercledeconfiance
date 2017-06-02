<?php
/**
 * Created by PhpStorm.
 * User: necro
 * Date: 01/06/17
 * Time: 16:28
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Model;
use AppBundle\Form\ModelType;
use Symfony\Component\HttpFoundation\Request;


class CreateModelController extends Controller
{
    /**
     * @Route("/test2")
     */
    public function createModelAction(Request $request){
        $item = new Model();
        $form = $this->createForm(ModelType::class, $item);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($item);
            $em->flush();
        }
        return $this->render('FrontBundle:Default:test.html.twig', array("form" => $form->createView()));
    }
}