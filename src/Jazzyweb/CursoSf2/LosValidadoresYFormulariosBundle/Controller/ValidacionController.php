<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\EntidadEclectica;
use Symfony\Component\Validator\Constraints\Email;

class ValidacionController extends Controller {
    
    public function validacionAction() {

        $e1 = new EntidadEclectica();

        $e1->setNombre("entidad_uno");
        $e1->setDescripcion("Lorem ipsum dolor sit amet, consectetur adipisicing elit");
        $e1->setEmail('entidad@gmail.com');
        $e1->setFecha(new \DateTime());        
        $e1->setFichero(__DIR__.'/../../../../../number_theory.pdf');

        $e1->setIp('10.10.203.22');
        $e1->setPuntuacion(3);
        $e1->setUrl('http://juandarodriguez.es');
        
        $e2 = new EntidadEclectica();

        $e2->setNombre("entidad dos");
        $e2->setDescripcion("Lorem ipsum dolor sit amet, consectetur adipisicing elit");
        $e2->setEmail('entidad at gmail.com');
        $e2->setFecha(new \DateTime());        
        $e2->setFichero(__DIR__.'/../../../../../composer.json');
        $e2->setIp('10.10.203.289');
        $e2->setPuntuacion(3);
        $e2->setUrl('http://juandarodriguez.es');
        
        $e3 = new EntidadEclectica();

        $e3->setNombre("entidad_uno");
        $e3->setDescripcion("Lorem ipsum dolor sit amet, consectetur adipisicing elit");
        $e3->setEmail('entidad@gmail.com');
        $e3->setFecha(new \DateTime());        
        $e3->setFichero(__DIR__.'/../../../../../number_theory.pdf');
        $e3->setIp('10.10.203.22');
        $e3->setPuntuacion(45);
        $e3->setUrl('juandarodriguez.ez');


        $validator = $this->get('validator');
 
        $e1Errors = $validator->validate($e1);
        $e2Errors = $validator->validate($e2);
        $e3Errors = $validator->validate($e3);

        return $this->render('JCSf2ValyFormsBundle:Validacion:validacion.html.twig', array(
            'e1_errors' => $e1Errors,
            'e2_errors' => $e2Errors,
            'e3_errors' => $e3Errors,
            'e1' => $e1,
            'e2' => $e2,
            'e3' => $e3,
                ));
    }
    
    public function validacionDirectaAction(){
        
    $emailConstraint = new Email();
    
    $emailConstraint->message = 'Dirección de email inválida';
    
    $validator = $this->get('validator');
    $errors = $validator->validateValue(
        'juandalibaba@gmail.com',
//         'juandalibaba at gmail.com',
        $emailConstraint
    );

    return $this->render('JCSf2ValyFormsBundle:Validacion:validacionDirecta.html.twig', array('errors' => $errors));

    }

}
