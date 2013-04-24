<?php

namespace Jazzyweb\CursoSf2\LosControladoresYRutasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RoutingController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2ControlRutasBundle:Routing:index.html.twig');
    }    

    public function articulosAction($_format) {

        $articulos = array(
            array(
                'id' => 1,
                'titulo' => 'Datos del primer trimestre del año',
                'categoria' => 'economia'
            ),
            array(
                'id' => 2,
                'titulo' => 'Götze, primera pieza del Bayern de Guardiola',
                'categoria' => 'deportes'
            ),
            array(
                'id' => 3,
                'titulo' => 'Mas defiende el derecho a decidir en una Cataluña sin \'tutelas\'',
                'categoria' => 'política'
            ),                                  
        );
        
//        $request = $this->getRequest();
//        $_format = $request->getRequestFormat();
        
        return $this->render('JCSf2ControlRutasBundle:Routing:articulos.'.$_format.'.twig', array('articulos' => $articulos));
    }

}
