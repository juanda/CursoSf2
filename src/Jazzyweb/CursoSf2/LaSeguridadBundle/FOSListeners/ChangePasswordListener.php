<?php
/**
 * This file is part of Bookmaker
 * User: juanda
 * Date: 14/10/13
 * Time: 9:53
 */

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\FOSListeners;


use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ChangePasswordListener implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::CHANGE_PASSWORD_SUCCESS => 'onPasswordSuccess',
        );
    }

    public function onPasswordSuccess(FormEvent $event)
    {
        $url = $this->router->generate('jc_sf2_seguridad_homepage');

        $event->setResponse(new RedirectResponse($url));
    }
}