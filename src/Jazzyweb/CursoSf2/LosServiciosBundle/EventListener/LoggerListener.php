<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;

class LoggerListener {

    protected $logger;
    
    public function __construct($logger) {
        $this->logger = $logger;
    }

    public function onEventInfo(GenericEvent $event) {
                
        $this->logger->info($event->getName(). ' | ' . serialize($event->getSubject()));
    }

}

