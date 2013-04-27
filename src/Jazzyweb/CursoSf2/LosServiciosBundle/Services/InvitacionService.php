<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Services;

class InvitacionService {

    public function __construct($sakila, $mailer, $templating) {
        $this->sakila = $sakila;
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function enviaInvitacion($idFilm, $to) {

        $film = $this->sakila->getFilmById($idFilm);        

        $message = \Swift_Message::newInstance()
                ->setSubject('CursoSf2 te invita al cine')
                ->setFrom('cursosf2@noreply.com')
                ->setTo($to)
                ->setBody(
                $this->templating->render(
                        'JCSf2LosServiciosBundle:Default:email.txt.twig', array('film' => $film)
                )
                )
        ;

        $this->mailer->send($message);
    }

}
