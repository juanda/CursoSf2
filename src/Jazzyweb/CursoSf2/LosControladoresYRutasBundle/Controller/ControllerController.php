<?php

namespace Jazzyweb\CursoSf2\LosControladoresYRutasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ControllerController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2ControlRutasBundle:Controller:index.html.twig');
    }
    

}
