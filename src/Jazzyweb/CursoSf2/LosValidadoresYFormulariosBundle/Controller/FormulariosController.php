<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Computadora;

class FormulariosController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2ValyFormsBundle:Formularios:index.html.twig');
    }

    public function enControladorAction() {

        $computer = new Computadora();

        $form = $this->createFormBuilder($computer)
                ->add('nombre', 'text')
                ->add('ubicacion', 'text')
                ->add('so', 'choice', array(
                    'choices' => array('0' => 'Linux', '1' => 'MacOSX', '2' => 'Windows'),
                    'required' => true,
                ))
                ->add('ip', 'text')
                ->add('mac', 'text')
                ->add('ram', 'integer')
                ->add('estaEnUso', 'radio')
                ->getForm();
        
        return $this->render('JCSf2ValyFormsBundle:Formularios:enControlador.html.twig', array(
            'form' => $form->createView()
        ));
    }

}

?>
