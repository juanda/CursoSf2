<?php

namespace Jazzyweb\CursoSf2\ElFOSUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
                        
        //ld($this->get('security.context')->getToken());
        return $this->render('JCSf2SeguridadBundle:Default:index.html.twig');
    }

    public function noSeguraAction() {
        
        $factory = $this->get('security.encoder_factory');
        $user = new \Jazzyweb\CursoSf2\ElFOSUserBundle\Entity\User();

        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword('pruebas', $user->getSalt());
        ld($encoder);
        ld($password);
        
        return $this->render('JCSf2FOSUserBundle:Default:noSegura.html.twig');
    }

    public function adminAction() {
        return $this->render('JCSf2FOSUserBundle:Default:admin.html.twig');
    }

    public function redaccionAction() {
        return $this->render('JCSf2FOSUserBundle:Default:redaccion.html.twig');
    }

}
