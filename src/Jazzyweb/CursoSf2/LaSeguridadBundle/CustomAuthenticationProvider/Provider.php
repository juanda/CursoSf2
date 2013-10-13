<?php
/**
 * Created by JetBrains PhpStorm.
 * User: juanda
 * Date: 13/10/13
 * Time: 16:30
 * To change this template use File | Settings | File Templates.
 */

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\CustomAuthenticationProvider;


use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class Provider implements AuthenticationProviderInterface{

    public function __construct(UserProviderInterface $userProvider)
    {
        echo "Provider:Provider/";
        $this->userProvider = $userProvider;
    }
    /**
     * Checks whether this provider supports the given token.
     *
     * @param TokenInterface $token A TokenInterface instance
     *
     * @return Boolean true if the implementation supports the Token, false otherwise
     */
    public function supports(TokenInterface $token)
    {
        return $token instanceof Token;
    }

    public function authenticate(TokenInterface $token)
    {
        echo "Provider:authenticate/";
        $user = $this->userProvider->loadUserByUserName($token->getUsername());

        $token = new Token($user->getRoles());
        $token->setUser($user);

        return $token;


        return true;
    }
}