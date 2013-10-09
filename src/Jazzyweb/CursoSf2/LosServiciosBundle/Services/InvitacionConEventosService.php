<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Services;

use Symfony\Component\EventDispatcher\GenericEvent;

class InvitacionConEventosService {

    public function __construct($sakila, $dispatcher, $templating, $subject, $from) {
        $this->sakila = $sakila;
        $this->dispatcher = $dispatcher;
        $this->templating = $templating;
        $this->subject = $subject;
        $this->from    = $from;
    }

    public function enviaInvitacion($idFilm, $to) {

        $film = $this->sakila->getFilmById($idFilm);

        $subject = array(
            'from' => $this->from,
            'to'   => $to,
            'subject' => $this->subject,
            'body'    => $this->templating->render(
                'JCSf2LosServiciosBundle:Default:email.txt.twig', array('film' => $film)
            )
        );
        $this->dispatcher->dispatch('invitacion_send', new GenericEvent($subject));

    }
}
