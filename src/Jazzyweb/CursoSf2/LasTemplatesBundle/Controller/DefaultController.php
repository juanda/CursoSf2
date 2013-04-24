<?php

namespace Jazzyweb\CursoSf2\LasTemplatesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function inicioAction() {
        return $this->render('JCSf2TemplatesBundle:Default:inicio.html.twig');
    }
    
    public function indexAction() {
        return $this->render('JCSf2TemplatesBundle:Default:index.html.twig');
    }

    public function bootstrapAction() {
        return $this->render('JCSf2TemplatesBundle:Default:bootstrap.html.twig');
    }
}
