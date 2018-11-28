<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Circle;
use AppBundle\Entity\Cloud;
use AppBundle\Entity\DataApp;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\CircleUser;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\Circle_userType;
use UserBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("/cercles")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/ajax/sendMessage", name="ajaxSendMessage")
     * @Method("POST")
     */
    public function sendMessageAction(Request $request)
    {
        function objectToArray($d) {
            if (is_object($d)) {
                // Gets the properties of the given object
                // with get_object_vars function
                $d = get_object_vars($d);
            }

            if (is_array($d)) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                return array_map(__FUNCTION__, $d);
            }
            else {
                // Return array
                return $d;
            }
        }
        if($request->isXmlHttpRequest())
        {
            $messageToSend = $request->request->get('messageToSend');
            $fields = json_encode(objectToArray(json_decode($messageToSend), true));
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                 'Authorization: Basic NGZhZjdlMGEtMzViMy00ZmNiLWFjOWEtMTc5ZjgyNjQzNDdk'));
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
             curl_setopt($ch, CURLOPT_HEADER, FALSE);
             curl_setopt($ch, CURLOPT_POST, TRUE);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

             $response = curl_exec($ch);
             curl_close($ch);
             $response = objectToArray(json_decode($response));
             if (array_key_exists('errors', $response)) {
                 $response =  ['error' => $response["errors"][0]];
             }
             $response = new JsonResponse($response);
             return $response;
         } else {
             return new JsonResponse(null);
         }
     }

     public function sendMessage($messageToSend){
         $fields = [
             'app_id' => $this->getParameter('one_signal_app_id'),
         ] + $messageToSend;
         $fields['app_id'] = $this->getParameter('one_signal_app_id');

         $fields = json_encode($fields);
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
             'Authorization: Basic NGZhZjdlMGEtMzViMy00ZmNiLWFjOWEtMTc5ZjgyNjQzNDdk'));
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
         curl_setopt($ch, CURLOPT_HEADER, FALSE);
         curl_setopt($ch, CURLOPT_POST, TRUE);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

         $response = curl_exec($ch);
         curl_close($ch);

         return $response;
     }

     /**
      * @Route("/error", name="errorAccess")
      */
    public function errorAccessAction($error = '')
    {
        return $this->render('AppBundle:Default:errorAccess.html.twig', ['error' => $error]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="accueil")
     */
    public function showCirclesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $circle_users = $em->getRepository('AppBundle:CircleUser')->findBy(['user' => $user->getId()]);
        return $this->render('AppBundle:Default:showCircles.html.twig',
            ['CUsers' => $circle_users, 'circleUser' => $user]);
    }

    /**
     * @Route("/{token}", name="appli")
     */
    public function accueilAppliAction(Request $request, Circle $circle)
    {
        $user = $this->getUser();
        $circleId = $circle->getId();
        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:CircleUser')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circleId]);
        if ($circleUser == null) {
            return $this->redirectToRoute('errorAccess');
        }
        $circleUsers = $em->getRepository('AppBundle:CircleUser')
            ->findBy(['circle' => $circleId]);

        $circleName = $circle->getName();
        $userToinvite = new User();
        $form = $this->createFormBuilder($userToinvite)
            ->add('email', EmailType::class, ['label'=>'Renseigner l\'email de la personne à inviter : '])
            //->add('name', TextType::class, ['label'=>'Nom : (optionnel)', 'required' => false])
            ->add('envoyer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-default btn-submit-resize')));
        $form = $form->getForm();

        $param = ['token' => $circle->getToken(), 'circleUser' => $circleUser, 'circleUsers' => $circleUsers, "form" => $form->createView()];

        if ($circleUser->getUser()->getFirstname() && $circleUser->getUser()->getName()) {
            $currentCircleUserFullname = $circleUser->getUser()->getFirstname() . ' ' . $circleUser->getUser()->getName();
        } elseif ($circleUser->getUser()->getFirstname()) {
            $currentCircleUserFullname = $circleUser->getUser()->getFirstname();
        } elseif ($circleUser->getUser()->getName()) {
            $currentCircleUserFullname = $circleUser->getUser()->getName();
        } elseif ($circleUser->getUser()->getUserName()) {
            $currentCircleUserFullname = $circleUser->getUser()->getUserName();
        } else {
            $currentCircleUserFullname = 'inconnu';
        }
        $currentUserName = ucwords(strtolower($currentCircleUserFullname));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mailer = $this->get('mailer');
            $message = new \Swift_Message('Invitation Cercle Confiance : ' . $circleName);
            $message->setTo($userToinvite->getEmail())
                ->setFrom([$this->getParameter('mailer_user') => 'Cercle Confiance'])
                ->setBody($this->renderView('invitation.html.twig', array('circleName' => $circleName, 'currentUserName' => $currentUserName, 'name' => $userToinvite->getName(), 'token'=>$circle->getToken())), 'text/html');

            $mailer->send($message);

            if ($mailer->send($message)) {
                $mailSent = true;
            } else {
                $mailSent = false;
            }

            $param = ['token' => $circle->getToken(), 'circleUser' => $circleUser, 'circleUsers' => $circleUsers, "form" => $form->createView(), 'mailSent'=>$mailSent, 'invitEmail' => $userToinvite->getEmail()];
        }

        // ##

        return $this->render('AppBundle:Default:accueilAppli.html.twig', $param);
    }

    /**
     * @Route("/{token}/admin", name="admin")
     */
    public function adminCircleAction(Request $request, Circle $circle)
    {

        $user = $this->getUser();
        $circleId = $circle->getId();
        $em = $this->getDoctrine()->getManager();
        $circleUser = $em->getRepository('AppBundle:CircleUser')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circleId]);
        if ($circleUser == null || $circleUser->getAdminCircle() == false) {
            return $this->redirectToRoute('errorAccess');
        }
        $circleUsers = $em->getRepository('AppBundle:CircleUser')
            ->findBy(['circle' => $circleId]);

        $circleName = $circle->getName();
        $userToinvite = new User();
        $form = $this->createFormBuilder($userToinvite)
            ->add('email', EmailType::class, ['label'=>'Renseigner l\'email de la personne à inviter : '])
            //->add('name', TextType::class, ['label'=>'Nom : (optionnel)', 'required' => false])
            ->add('envoyer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-default btn-submit-resize')));
        $form = $form->getForm();

        $param = ['token' => $circle->getToken(), 'circleUser' => $circleUser, 'circleUsers' => $circleUsers, "form" => $form->createView()];

        if ($circleUser->getUser()->getFirstname() && $circleUser->getUser()->getName()) {
            $currentCircleUserFullname = $circleUser->getUser()->getFirstname() . ' ' . $circleUser->getUser()->getName();
        } elseif ($circleUser->getUser()->getFirstname()) {
            $currentCircleUserFullname = $circleUser->getUser()->getFirstname();
        } elseif ($circleUser->getUser()->getName()) {
            $currentCircleUserFullname = $circleUser->getUser()->getName();
        } elseif ($circleUser->getUser()->getUserName()) {
            $currentCircleUserFullname = $circleUser->getUser()->getUserName();
        } else {
            $currentCircleUserFullname = 'inconnu';
        }
        $currentUserName = ucwords(strtolower($currentCircleUserFullname));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mailer = $this->get('mailer');
            $message = new \Swift_Message('Invitation Cercle Confiance : ' . $circleName);
            $message->setTo($userToinvite->getEmail())
                ->setFrom([$this->getParameter('mailer_user') => 'Cercle Confiance'])
                ->setBody($this->renderView('invitation.html.twig', array('circleName' => $circleName, 'currentUserName' => $currentUserName, 'name' => $userToinvite->getName(), 'token'=>$circle->getToken())), 'text/html');

            $mailer->send($message);

            if ($mailer->send($message)) {
                $mailSent = true;
            } else {
                $mailSent = false;
            }

            $param = ['token' => $circle->getToken(), 'circleUser' => $circleUser, 'circleUsers' => $circleUsers, "form" => $form->createView(), 'mailSent'=>$mailSent, 'invitEmail' => $userToinvite->getEmail()];
        }
        return $this->render('AppBundle:Default:adminCircle.html.twig', $param);
    }

    /**
     * @Route("/{token}/visio", name="visio")
     * @Route("/{token}/visio-conference", name="visio-conference")
     */
    public function visioConferenceAction(Circle $circle)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $circleId = $circle->getId();
        $currentCircleUser = $em->getRepository('AppBundle:CircleUser')
            ->findOneBy(['user' => $user->getId(), 'circle' => $circleId]);

        $currentCircleUserId = $currentCircleUser->getUser()->getId();

        if ($currentCircleUser == null || $currentCircleUser->getCallAccess() == false) {
            return $this->redirectToRoute('errorAccess');
        }
        $cUsers = $em->getRepository('AppBundle:CircleUser')->findBy(['circle' => $circleId]);
        $circleName = $circle->getName();

        $circleUsers = $cUsers;
        $circleUserAdmin = array();
        $circleUserCenter = array();
        $cUserWithoutThis = array();

        if ($currentCircleUser->getUser()->getFirstname() && $currentCircleUser->getUser()->getName()) {
            $currentCircleUserFullname = $currentCircleUser->getUser()->getFirstname() . ' ' . $currentCircleUser->getUser()->getName();
        } elseif ($currentCircleUser->getUser()->getFirstname()) {
            $currentCircleUserFullname = $currentCircleUser->getUser()->getFirstname();
        } elseif ($currentCircleUser->getUser()->getName()) {
            $currentCircleUserFullname = $currentCircleUser->getUser()->getName();
        } elseif ($currentCircleUser->getUser()->getUserName()) {
            $currentCircleUserFullname = $currentCircleUser->getUser()->getUserName();
        } else {
            $currentCircleUserFullname = 'inconnu';
        }
        $currentUserName = ucwords(strtolower($currentCircleUserFullname));

        $filters = [
            [
                "field" => "tag", "key" => "user_id_circle_id", "relation" => "=", "value" => $circleId,
            ],
            [
                "operator" => "AND"
            ],
            [
                "field" => "tag", "key" => "user_id_circle_user_id", "relation" => "!=", "value" => $currentCircleUserId,
            ]
        ];

        //$subject = 'Nouveau message de ' . $currentCircleUserFullname . ' ajouté sur le Mur du Cercle Confiance : ' . $circleName;
        // Exclude the current user from array
        foreach ($cUsers as $cUser){
            if(true == $cUser->getAdminCircle()){
                $circleUserAdmin = $cUser;
            }
            elseif(true == $cUser->getCircleCenter()){
                $circleUserCenter = $cUser;
            }else{
                $cUserOther[] = $cUser;
            }

            //if ($cUser->getUser()->getId() != $user->getId()){
            if($currentCircleUserId != $cUser->getUser()->getId()){
                $cUserWithoutThis[] = $cUser;
                $filters[] = [
                    "operator" => "OR"
                ];
                $filters[] = [
                    "field" => "tag", "key" => "user_id_circle_user_id", "relation" => "=", "value" => $cUser->getUser()->getId(),
                ];
            }
        }

        $locale = 'fr';
        $title = $circleName . ' | ' . 'Visio | ' . date('d/m/Y H:i:s');
        $headings = array(
            "en" => $circleName . ' | ' . 'Visio | ' . date('d/m/Y H:i:s'),
            $locale => $title
        );
        //$msg = $currentCircleUserFullname .' est connecté sur la Visio du Cercle Confiance "' . $circleName .'"';
        //$msg = $currentCircleUserFullname .' : en ligne à la Visio du Cercle Confiance "' . $circleName .'"';
        //$msg = 'Visio du Cercle Confiance "' . $circleName .'", ' . $currentCircleUserFullname . ' : en ligne';
        //$msg = $currentCircleUserFullname . ' : en ligne sur Visio du Cercle Confiance "' . $circleName;
        $msg = $currentUserName . ' : en ligne sur Visio (' . date('H:i:s') . ')';
        $contents = [
            //'en' => $currentCircleUserFullname .' is online on the Trust Circle Visio "' . $circleName .'"',
            //'en' => $currentCircleUserFullname .' : online to the Trust Circle Visio "' . $circleName .'"',
            //'en' => 'Visio of the Trust Circle "' . $circleName .'", ' . $currentCircleUserFullname . ' : online ',
            //'en' =>  $currentCircleUserFullname . ' : online on Visio of the Trust Circle "' . $circleName,
            'en' =>  $currentUserName . ' : online on Visio (' . date('H:i:s') . ')',
            $locale => $msg
        ];

        $url = 'https://cercle-confiance.fr' . $this->generateUrl('visio-conference', ['token'=>$circle->getToken()]) . '#autoconnect';
        $web_buttons = [];
        array_push($web_buttons, [
            "id" => "wall-button",
            "text" => 'Accéder à la visio du Cercle Confiance ' . $circleName,
            "icon" => "",
            "url" => $url
        ]);
        $notificationType = 'visio-feature-' . $circle->getToken();;
        $uniqId = uniqid($notificationType . '_' . time());

        $website_name    = 'Cercle Confiance';
        $msg             = $contents;
        $website_url     = $url;
        $website_icon    = 'https://cercle-confiance.fr/assets/img/logos/logo-CERCLE-CONFIANCE-quadri.png';
        $messageToSend = $additionalDataHash = [
            'app_id' => $this->getParameter('one_signal_app_id'),
            'disable_badge_clearing' => true,
            'web_push_topic' => $uniqId,
            'notificationType' => $notificationType,
            'url' => $url,
            'headings' => $headings,
            'filters' => $filters,
            'contents' => $contents,
            'web_buttons' => $web_buttons,
            'android_group' => $notificationType,
            'android_group_message' => [
                "en" => "You have $[notif_count] new messages",
                'fr' => "Vous avez $[notif_count] nouveau(x) message(s)",
            ],
            'ios_badgeType' => 'Increase',
            'ios_badgeCount' => 1
        ];
        $buttons         = $web_buttons;

        $notificationDatas = [
            'app_id' => $this->getParameter('one_signal_app_id'),
            $website_name,
            /* Message (defaults if unset) */
            $msg,
            $website_url,
            $website_icon,
            $additionalDataHash,
            $buttons
        ];
        //$response = $this->sendMessage($messageToSend);
        //$return["allresponses"] = $response;
        //$return = json_encode( $return);

        $roomName = $circle->getName();
        $roomName = trim($roomName);
        $roomName = htmlspecialchars($roomName, ENT_QUOTES);
        $roomName = preg_replace('/&#?[a-z0-9]{2,8};/i', '_', $roomName);
        $roomName = mb_convert_case( $roomName, MB_CASE_UPPER, mb_internal_encoding() );
        $roomName = preg_replace( "/\s+/", "", $roomName );

        $param = ['token' => $circle->getToken(),
            'circleUserAdmin' => $circleUserAdmin,
            'circleUserCenter' => $circleUserCenter,
            'circleUser' => $currentCircleUser,
            'circleUserFullname' => $currentUserName,
            'CUsers' => $cUserWithoutThis,
            'circleUsers' => $circleUsers,
            'roomName' => $roomName,
            //'messageToSend' =>  htmlspecialchars_decode(json_encode($messageToSend))
            'messageToSend' =>  $messageToSend,
            'notificationDatas' =>  $notificationDatas
        ];
        return $this->render('AppBundle:Default:visio-conference.html.twig', $param);
    }

    /**
     * @Route("/{token}/cloud", name="cloud")
     */
    public function cloudAction(Circle $circle, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $circleId = $circle->getId();
        $currentCircleUser = $em->getRepository('AppBundle:CircleUser')->findOneBy(['user' => $user->getId(), 'circle' => $circleId]);
        if ($currentCircleUser == null || $currentCircleUser->getCloudAccess() == false) {
            return $this->redirectToRoute('errorAccess');
        }

        $circleUsers = $em->getRepository('AppBundle:CircleUser')->findBy(['circle' => $circleId]);
        $circleName = $circle->getName();

        $circleUserId = array();
        $circleUsersIds = array();
        $cloudUsersColors = array();

        $colors = array('#0084FF','#483d3f','#44BEC7','#6699CC','#20CEF5','#67B868','#77685d','#13CF13','#7646FF','#058ed9','#a39a92','#FFC300', '#FA3C4C', '#D696BB', '#FF7E29', '#E68585', '#D4A88C', '#FF5CA1', '#A695C7', '1C75BC', '5598CD', '8EBBDE', 'C6DCEE', 'E9F2F9', '1863A0', '15588D', '0E3B5E', '071D2F', '030C13', '36ABE2', '69C0EA', '9BD6F1', 'CDEAF8', 'EBF7FD', '2E91C0', '2980AA', '1B5671', '0E2B39', '051117', 'C2B499', 'D2C7B3', 'E1DACD', 'F0ECE5', 'F9F8F5', 'A59982', '928773', '615A4D', '312D26', '13120F');
        foreach ($circleUsers as $key => $user) {
            $circleUserId[] = $user->getId();
            $circleUsersIds[] = $user->getUser()->getId();
            $cloudUsersColors[$user->getUser()->getId()] = $colors[$key];
        }

        $currentCircleUserId = $currentCircleUser->getUser()->getId();

        $cloud = new Cloud();
        $dataApp = new DataApp();

        $form = $this->createFormBuilder($cloud)
            ->add('file_name', FileType::class, ['label' => 'Envoyer un fichier'])
            ->add('Envoyer', SubmitType::class)
            ->getForm();

        $fileName = '';
        if (isset($_FILES['form']['type']['file_name'])) {
            $fileName = $_FILES['form']['name']['file_name'];
            $cloud->setFileType($_FILES['form']['type']['file_name']);

            //$targetDir = $circle->getToken();
            $feature_dir = 'cloud';
            $targetDir = 'circles/' . $circle->getToken() . '/' . $feature_dir . '/' . $user->getId() . '/' . time ();

            $cloud->setTargetDir($targetDir);
        }

        $form->handleRequest($request);
        $dataApp->setCloud($cloud);
        $dataApp->setCircleUser($currentCircleUser);
        $creationDate = new \DateTime('now');
        //$dataApp->setCreationDate(new \DateTime());
        $dataApp->setCreationDate($creationDate);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($dataApp);
            $em->persist($cloud);
            $em->flush();

            if ($currentCircleUser->getUser()->getFirstname() && $currentCircleUser->getUser()->getName()) {
                $currentCircleUserFullname = $currentCircleUser->getUser()->getFirstname() . ' ' . $currentCircleUser->getUser()->getName();
            } elseif ($currentCircleUser->getUser()->getFirstname()) {
                $currentCircleUserFullname = $currentCircleUser->getUser()->getFirstname();
            } elseif ($currentCircleUser->getUser()->getName()) {
                $currentCircleUserFullname = $currentCircleUser->getUser()->getName();
            } elseif ($currentCircleUser->getUser()->getUserName()) {
                $currentCircleUserFullname = $currentCircleUser->getUser()->getUserName();
            } else {
                $currentCircleUserFullname = 'inconnu';
            }
            $currentUserName = ucwords(strtolower($currentCircleUserFullname));

            $filters = [
                [
                    "field" => "tag", "key" => "user_id_circle_id", "relation" => "=", "value" => $circleId,
                ],
                [
                    "operator" => "AND"
                ],
                [
                    "field" => "tag", "key" => "user_id_circle_user_id", "relation" => "!=", "value" => $currentCircleUserId,
                ]
            ];

            $mailer = $this->get('mailer');
            $mailer_message = new \Swift_Message('Nouveau document ajouté dans le Cercle Confiance : ' . $circleName);
            foreach($circleUsers as $circleUser){
                /*if(true == $circleUser->getAdminCircle()){
                    $circleUserAdmin = $circleUser;
                }
                elseif(true == $circleUser->getCircleCenter()){
                    $circleUserCenter = $circleUser;
                }else{
                    $circleUserOther[] = $circleUser;
                }*/
                if($currentCircleUserId != $circleUser->getUser()->getId()) {
                    $filters[] = [
                        "operator" => "OR"
                    ];
                    $filters[] = [
                        "field" => "tag", "key" => "user_id_circle_user_id", "relation" => "=", "value" => $circleUser->getUser()->getId(),
                    ];
                    $userEmail = $circleUser->getUser()->getEmail();
                    $userName = $circleUser->getUser()->getFirstname() . ' ' . $circleUser->getUser()->getName();
                    $mailer_message->addBcc($userEmail, $userName);
                }
            }

            $locale = 'fr';
            $title = $circleName . ' | ' . 'Partage de fichiers | ' . date('d/m/Y H:i:s');
            $headings = array(
                "en" => $circleName . ' | ' . 'Cloud | ' . date('d/m/Y H:i:s'),
                $locale => $title
            );
            //$msg = $currentUserName .'  a soumis un nouveau fichier "'. $fileName .'" dans le Cloud du Cercle Confiance "' . $circleName .'"';
            $msg = $currentUserName .'  a soumis un nouveau fichier "'. $fileName .' (' . date('H:i:s') . ')';
            $contents = [
                //'en' => $currentUserName .' submitted a new file "'. $fileName .'" in the Cloud of the Trust Circle "' . $circleName .'"',
                'en' => $currentUserName .' submitted a new file "'. $fileName .' (' . date('H:i:s') . ')',
                $locale => $msg
            ];

            //$url = 'https://cercle-confiance.fr' . $this->generateUrl('cloud', ['token'=>$circle->getToken()]) . '#' . $currentCircleUserId;
            $url = 'https://cercle-confiance.fr' . $this->generateUrl('cloud', ['token'=>$circle->getToken()]) . '#' . preg_replace('/\s+/', '_', $currentUserName . '_' . $currentCircleUserId);
            $web_buttons = [];
            array_push($web_buttons, [
                "id" => "cloud-button",
                "text" => 'Accéder au Cloud du Cercle Confiance ' . $circleName,
                "icon" => "",
                "url" => $url
            ]);
            $notificationType = 'cloud-feature-' . $circle->getToken();
            $uniqId = uniqid($notificationType . '_' . time());
            $messageToSend = [
                'disable_badge_clearing' => true,
                'web_push_topic' => $uniqId,
                'notificationType' => $notificationType,
                'url' => $url,
                'headings' => $headings,
                'filters' => $filters,
                'contents' => $contents,
                'web_buttons' => $web_buttons,
                'android_group' => $notificationType,
                'android_group_message' => [
                    "en" => "You have $[notif_count] new messages",
                    'fr' => "Vous avez $[notif_count] nouveau(x) message(s)",
                ],
                'ios_badgeType' => 'Increase',
                'ios_badgeCount' => 1
            ];
            if(preg_match('/image/', $cloud->getFileType())) {
                $messageToSend['chrome_web_image'] = 'https://cercle-confiance.fr/' . 'uploads/' . $cloud->getFileName();
            }
            $response = $this->sendMessage($messageToSend);
            $return["allresponses"] = $response;
            $return = json_encode($return);

            $mailer_message
                ->setFrom([$this->getParameter('mailer_user') => 'Cercle Confiance'])
                ->setBody($this->renderView('cloud_confirmation.html.twig',
                    array(
                        'circleName' => $circleName,
                        'token'=>$circle->getToken(),
                        'fileName'=>$fileName,
                        'currentUserName' => $currentUserName
                    )
                ),
                    'text/html');
            $mailer->send($mailer_message);

            $this->addFlash('success', 'Fichier envoyé !');
            return $this->redirectToRoute('cloud', ['token' => $circle->getToken()]);
        }

        $params = [
            'this'=> $this,
            'upload_directory' => $this->getParameter('upload_directory'),
            'cloudUsersColors'=>$cloudUsersColors,
            'token' => $circle->getToken(), 'CUsers' => $circleUsers, 'form' => $form->createView(),
            'circleUser' => $currentCircleUser
        ];
        return $this->render('AppBundle:Default:cloud.html.twig', $params);
    }

    public function getFileSize($filename)
    {
        $size = 0;

        if (is_file($filename)) {
            $size = filesize($filename) ?: 0;
        }
        if ($size >= 1024 * 1024 * 1024) {
            return sprintf('%.1f GB', $size / 1024 / 1024 / 1024);
        }

        if ($size >= 1024 * 1024) {
            return sprintf('%.1f MB', $size / 1024 / 1024);
        }

        if ($size >= 1024) {
            return sprintf('%d KB', $size / 1024);
        }

        return sprintf('%d B', $size);
    }

    /**
     * @Route("/{token}/objects", name="show_objects")
     */
    public function showCircleObjectsAction(Circle $circle)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $currentCircleUser = $em->getRepository('AppBundle:CircleUser')->findOneBy(['user' => $user->getId(), 'circle' => $circle->getId()]);

        if ($currentCircleUser == null) {
            return $this->redirectToRoute('errorAccess');
        }

        $circleName = $circle->getName();
        return $this->render('AppBundle:Default:statsObjects.html.twig',
            ['token' => $circle->getToken(),
            'circleName' => $circleName,
            'circleUser' => $currentCircleUser]
        );
    }

}
