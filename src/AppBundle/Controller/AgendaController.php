<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 26/06/17
 * Time: 15:22
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\CircleUser;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class AgendaController extends Controller
{


    /**
     * @Route("/cercles/{token}/agenda", name="agenda")
     */
    public function showAgendaAction(Request $request, $token)
    {

        if ($request->isXmlHttpRequest()) {

            $rawData = ($request->request->all());
            var_dump($rawData);
            die();
        }

        $param = ['token' => $token];
        return $this->render('AppBundle:Default:agenda.html.twig', $param);
    }

}