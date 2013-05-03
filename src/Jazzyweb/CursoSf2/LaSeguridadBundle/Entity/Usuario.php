<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\UsuarioRepository")
 */
class Usuario implements AdvancedUserInterface {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", nullable=true, type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAlta", type="datetime")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaVencimiento", type="datetime")
     */
    private $fechaVencimiento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bloqueado", type="boolean")
     */
    private $bloqueado;

    /**
     * @ORM\ManyToMany(targetEntity="Perfil", inversedBy="usuarios")
     */
    private $perfiles;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos() {
        return $this->apellidos;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Usuario
     */
    public function setActivo($activo) {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo() {
        return $this->activo;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuario
     */
    public function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta() {
        return $this->fechaAlta;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     * @return Usuario
     */
    public function setFechaVencimiento($fechaVencimiento) {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime 
     */
    public function getFechaVencimiento() {
        return $this->fechaVencimiento;
    }

    /**
     * Set bloqueado
     *
     * @param boolean $bloqueado
     * @return Usuario
     */
    public function setBloqueado($bloqueado) {
        $this->bloqueado = $bloqueado;

        return $this;
    }

    /**
     * Get bloqueado
     *
     * @return boolean 
     */
    public function getBloqueado() {
        return $this->bloqueado;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt() {
        return $this->salt;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {

        $roles = array();
        foreach ($this->getPerfiles() as $p) {
            $roles[] = $p->getRol();
        }

        return $roles;
    }

    public function isAccountNonExpired() {

        $hoy = new \DateTime();
        if ($this->getFechaVencimiento() >= $hoy)
            return true;

        return false;
    }

    public function isAccountNonLocked() {
        return !$this->bloqueado;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return !$this->bloqueado;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->perfiles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add perfiles
     *
     * @param \Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Perfil $perfiles
     * @return Usuario
     */
    public function addPerfile(\Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Perfil $perfiles) {
        $this->perfiles[] = $perfiles;

        return $this;
    }

    /**
     * Remove perfiles
     *
     * @param \Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Perfil $perfiles
     */
    public function removePerfile(\Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Perfil $perfiles) {
        $this->perfiles->removeElement($perfiles);
    }

    /**
     * Get perfiles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPerfiles() {
        return $this->perfiles;
    }


    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}