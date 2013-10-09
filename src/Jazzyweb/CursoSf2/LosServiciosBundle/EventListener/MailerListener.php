<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

class MailerListener {

    protected $mailer;

    public function __construct($mailer) {
        $this->mailer = $mailer;
    }

    public function sendMail(GenericEvent $event) {

//        ldd($event);

        $data = $event->getSubject();

        $message = \Swift_Message::newInstance()
                ->setSubject($data['subject'])
                ->setFrom($data['from'])
                ->setTo($data['to'])
                ->setBody($data['body'])
        ;
        $this->mailer->send($message);
    }

}

