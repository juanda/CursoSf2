<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\CustomAuthenticationProvider;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;

class Listener implements ListenerInterface {

    public function __construct(SecurityContextInterface $securityContext, AuthenticationManagerInterface $authenticationManager)
    {
        echo "Listener:Listener/";
        $this->securityContext = $securityContext;
        $this->authenticationManager = $authenticationManager;
    }
    /**
     * This interface must be implemented by firewall listeners.
     *
     * @param GetResponseEvent $event
     */
    public function handle(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $username = $request->get('username');
        $password = $request->get('password');

        $token = new Token();
        $token->setUsername($username);
        $token->setPassword($password);


        try{
            $authToken = $this->authenticationManager->authenticate($token);
            $this->securityContext->setToken($authToken);
        }catch (AuthenticationException $e){

        }
        $response = new Response();
        $response->setStatusCode(403);
        $response->setContent('Acceso denegado por que si');
        $event->setResponse($response);
    }
}