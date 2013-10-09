<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Services;

class InvitacionService {

    public function __construct($sakila, $mailer, $templating, $subject, $from ) {
        $this->sakila = $sakila;
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->subject = $subject;
        $this->from = $from;
    }

    public function enviaInvitacion($idFilm, $to) {

        $film = $this->sakila->getFilmById($idFilm);        

        $message = \Swift_Message::newInstance()
                ->setSubject($this->subject)
                ->setFrom($this->from)
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
