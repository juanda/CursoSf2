<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\CustomAuthenticationProvider;


use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class Token extends AbstractToken {

    public function __construct(array $roles = array()){

        parent::__construct($roles);
    }
    /**
     * Returns the user credentials.
     *
     * @return mixed The user credentials
     */
    public function getCredentials()
    {
        return $this->getUser()->getPassword();
    }

}