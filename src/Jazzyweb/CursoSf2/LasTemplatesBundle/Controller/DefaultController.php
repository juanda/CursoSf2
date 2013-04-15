<?php

namespace Jazzyweb\CursoSf2\LasTemplatesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JCSf2TemplatesBundle:Default:index.html.twig');
    }
}
