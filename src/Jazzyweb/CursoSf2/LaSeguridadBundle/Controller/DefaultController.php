<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller {

    public function indexAction() {
                        
        //ld($this->get('security.context')->getToken());
        return $this->render('JCSf2SeguridadBundle:Default:index.html.twig');
    }

    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                    SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
                        'JCSf2SeguridadBundle:Default:login.html.twig', array(
                    // last username entered by the user
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'error' => $error,
                        )
        );
    }

    public function loginCheckAction() {
        
    }

    public function noSeguraAction() {
        
        $factory = $this->get('security.encoder_factory');
        $user = new \Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Usuario();

        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword('pruebas', $user->getSalt());
        ld($encoder);
        ld($password);
        
        return $this->render('JCSf2SeguridadBundle:Default:noSegura.html.twig');
    }

    public function adminAction() {
        return $this->render('JCSf2SeguridadBundle:Default:admin.html.twig');
    }

    public function redaccionAction() {
        return $this->render('JCSf2SeguridadBundle:Default:redaccion.html.twig');
    }

}
