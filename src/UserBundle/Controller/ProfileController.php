<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Controller;

use AppBundle\Form\RegistrationType;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Provider\PreAuthenticatedAuthenticationProvider;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Symfony\Component\HttpFoundation\File\File;
/**
 * Controller managing the user profile.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ProfileController extends Controller
{
    public function convertToCamelCase(string $value, string $encoding = null) {
        if ($encoding == null){
            $encoding = mb_internal_encoding();
        }
        $stripChars = "()[]{}=?!.:,-_+\"#~/";
        $len = strlen( $stripChars );
        for($i = 0; $len > $i; $i ++) {
            $value = str_replace( $stripChars [$i], " ", $value );
        }
        $value = mb_convert_case( $value, MB_CASE_TITLE, $encoding );
        $value = preg_replace( "/\s+/", "", $value );
        return $value;
    }

    /**
     * Show the user.
     */
    public function showAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * Edit the user.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function editAction(Request $request)
    {
        $user = $this->getUser();
        $email = $user->getEmail();
        $pattern = "/([a-z0-9\-._+]+).*/i";
        preg_match_all($pattern, $email,$matches);
        $username = $this->convertToCamelCase($matches[1][0]);
        $user->setUsername($username);
        $user->setUsernameCanonical($username);

        if(!$user) {
           // throw new AccessDeniedException('System Error Profile Edit.');
            $url = $this->generateUrl('accueil');
            $response = new RedirectResponse($url);
            return $response;
        }
        $oldfile = $user->getAvatar();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);
        if (isset($_FILES['fos_user_profile_form']['type']['avatar'])) {
            //$fileName = $_FILES['fos_user_profile_form']['name']['avatar'];
            $user->setFileType($_FILES['fos_user_profile_form']['type']['avatar']);

            if (null === $user->getConfirmationToken()) {
                $tokenGenerator = $this->get('fos_user.util.token_generator');
                $user->setConfirmationToken($tokenGenerator->generateToken());
            }
            //$targetDir = 'profiles/' . $user->getId() . '/' . $_POST['fos_user_profile_form']['_token'];
            $feature_dir = 'profiles';
            $targetDir = $feature_dir . '/' . $user->getId() . '/' . $user->getConfirmationToken();
            $user->setTargetDir($targetDir);
        }
        if ($user->getAvatar() === null) {
            $user->setAvatar($oldfile);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            if ($user->getAvatar()) {
                if (preg_match('/tmp/', $user->getAvatar())) {
                    if($user_id = $user->getId()) {
                        $returnValue = preg_replace('/tmp/', $user_id, $user->getAvatar());
                    }
                    $filename = basename ($returnValue);

                    $targetDir = preg_replace('/'.$filename.'/', '', $returnValue);
                    $sourcePath = $this->getParameter('upload_directory')  . '/' . $user->getAvatar();
                    $oldDir = $this->getParameter('upload_directory')  . '/' .  preg_replace('/'.$filename.'/', '', $user->getAvatar());

                    $file = new File($sourcePath);
                    $movedFile = $file->move('uploads/' . $targetDir);

                    if($movedFile) {
                        if (is_dir($oldDir) && count(scandir($oldDir)) == 2) {
                            rmdir($oldDir);
                        }
                    };
                    $user->setAvatar($returnValue);
                }
            }
            /** @var $userManager UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);

            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('accueil');
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            return $response;
        }

        return $this->render('@FOSUser/Profile/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
