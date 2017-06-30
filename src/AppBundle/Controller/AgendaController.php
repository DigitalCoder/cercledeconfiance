<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 26/06/17
 * Time: 15:22
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Agenda;
use AppBundle\Entity\Circle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AgendaController extends Controller
{


    /**
     * @Route("/cercles/{token}/agenda", name="agenda")
     */
    public function showAgendaAction(Request $request, Circle $circle)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $circleUser = $em->getRepository('AppBundle:CircleUser')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);
        if ($request->isXmlHttpRequest()) {

            $postData = ($request->request->all());

            if (isset($postData['delete'])){
                $eventToDelete = $em->getRepository('AppBundle:Agenda')->findOneBy(['eventId'=>$postData['delete']]);
                $em->remove($eventToDelete);
                $em->flush();
            }

            $event = $em->getRepository('AppBundle:Agenda')->findOneBy(['eventId'=>$postData['id']]);

            if (isset($event)) {
                $event->setTitle($postData['title']);
                $event->setDescription($postData['description']);
                $event->setEventStart($postData['start']);
                $event->setEventEnd($postData['end']);
                $em->persist($event);
                $em->flush();
            }

            if (!isset($event)) {
                $newEvent = new Agenda();
                $newEvent->setEventId($postData['id']);
                $newEvent->setTitle($postData['title']);
                $newEvent->setDescription($postData['description']);
                $newEvent->setEventStart($postData['start']);
                $newEvent->setEventEnd($postData['end']);
                $newEvent->setToken($circle->getToken());
                $em->persist($newEvent);
                $em->flush();
            }


        }

        $param = ['token' => $circle->getToken(), 'circleUser' => $circleUser];
        return $this->render('AppBundle:Default:agenda.html.twig', $param);
    }

    /**
     * @Route("/cercles/{token}/agenda/json", name="json")
     */
    public function getJsonAction($token)
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AppBundle:Agenda')->findBy(['token'=>$token]);

        $eventsData = [];
        $i = 0;
        foreach ($events as $event){
            $eventsData[$i]['id']= $event->getEventId();
            $eventsData[$i]['title']= $event->getTitle();
            $eventsData[$i]['description']= $event->getDescription();
            $eventsData[$i]['start']= $event->getEventStart();
            $eventsData[$i]['end']= $event->getEventEnd();
            $i++;
        }

        return new JsonResponse($eventsData);

    }

}