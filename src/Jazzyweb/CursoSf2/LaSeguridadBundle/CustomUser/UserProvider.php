<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\CustomUser;


use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface {

    private $users;

    public function __construct(){

        $this->users = array(
            'max' => array(
                'password' => 'pruebas',
                'salt'     => '',
                'roles'    => array('ROLE_REGISTRADO')
                ),
            'baruj' => array(
                'password' => 'pruebas',
                'salt'     => '',
                'roles'    => array('ROLE_ADMIN')
            ),
            'alberto' => array(
                'password' => 'pruebas',
                'salt'     => '',
                'roles'    => array('ROLE_REDACTOR')
            ),
        );
    }
    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return UserInterface
     *
     * @see UsernameNotFoundException
     *
     * @throws UsernameNotFoundException if the user is not found
     *
     */
    public function loadUserByUsername($username)
    {
        // buscar el usuario y devolver la excepción si no se encuentra
        if(!array_key_exists($username, $this->users)){
            throw new UsernameNotFoundException;
        }

        // Crear el objeto usuario
        $user = new User($username,
            $this->users[$username]['password'],
            $this->users[$username]['salt'],
            $this->users[$username]['roles']);

        // devolverlo
        return $user;
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     * @param UserInterface $user
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException if the account is not supported
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * Whether this provider supports the given user class
     *
     * @param string $class
     *
     * @return Boolean
     */
    public function supportsClass($class)
    {
        return $class === 'Jazzyweb\CursoSf2\LaSeguridadBundle\CustomUser\User';
    }
}