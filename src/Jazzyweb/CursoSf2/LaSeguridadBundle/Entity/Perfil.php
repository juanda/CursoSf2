<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perfil
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\PerfilRepository")
 */
class Perfil {

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
     * @ORM\Column(name="descripcion", nullable=true, type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="Rol", type="string", length=255)
     */
    private $rol;

    /**
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="perfiles")
     */
    private $usuarios;

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
     * @return Perfil
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Perfil
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set rol
     *
     * @param string $rol
     * @return Perfil
     */
    public function setRol($rol) {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string 
     */
    public function getRol() {
        return $this->rol;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add usuarios
     *
     * @param \Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Usuario $usuarios
     * @return Perfil
     */
    public function addUsuario(\Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios[] = $usuarios;
    
        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Usuario $usuarios
     */
    public function removeUsuario(\Jazzyweb\CursoSf2\LaSeguridadBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}