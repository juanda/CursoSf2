<?php

namespace Jazzyweb\ChismorreosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JazzywebChismorreosBundle:Default:index.html.twig', array('name' => $name));
    }
}
