<?php

namespace Jazzyweb\CursoSf2\LosFundamentosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JCSf2FundamentosBundle:Default:index.html.twig');
    }
}
