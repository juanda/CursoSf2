<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2LosServiciosBundle:Default:index.html.twig');
    }

    public function servicioBasicoAction() {

        $miServicio = $this->get('jc_sf2_los_servicios.servicio_basico');

        /**
         * wrapper de $this->container->get('jc_sf2_los_servicios.servicio_basico');
         */
        $mensaje = $miServicio->diHola();        
        

        return $this->render('JCSf2LosServiciosBundle:Default:servicioBasico.html.twig', array('mensaje' => $mensaje));
    }

    public function actoresAction() {

        $sakilaService = $this->get('jc_sf2_los_servicios.sakila');

        $actores = $sakilaService->getActors();

        return $this->render('JCSf2LosServiciosBundle:Default:actores.html.twig', array('actores' => $actores));
    }

    public function actoresORMAction() {

        $sakilaService = $this->get('jc_sf_los_servicios.sakilaorm');

        $actores = $sakilaService->getActors();

        return $this->render('JCSf2LosServiciosBundle:Default:actoresorm.html.twig', array('actores' => $actores));
    }

    public function actorAction() {

        $request = $this->getRequest();
        $id = $request->get('id');

        $sakilaService = $this->get('jc_sf2_los_servicios.sakila');

        $actor = $sakilaService->getActorById($id);

        $films = $sakilaService->getFilmsOfActor($id);

        return $this->render('JCSf2LosServiciosBundle:Default:actor.html.twig', array(
                    'actor' => $actor,
                    'films' => $films
        ));
    }

    public function invitacionAction() {
        $request = $this->getRequest();
        $id = $request->get('id');
        $to = $request->get('to');
        
//        $invitacionService = $this->get('jc_sf2_los_servicios.invitacion');
        $invitacionService = $this->get('jc_sf2_los_servicios.invitacionconeventos');

        $invitacionService->enviaInvitacion($id, $to);

        return $this->render('JCSf2LosServiciosBundle:Default:invitacionSuccess.html.twig', array('to' => $to));
    }

}
