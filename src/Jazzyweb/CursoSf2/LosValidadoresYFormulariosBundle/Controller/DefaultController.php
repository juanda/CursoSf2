<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2ValyFormsBundle:Default:index.html.twig');
    }

   
}
