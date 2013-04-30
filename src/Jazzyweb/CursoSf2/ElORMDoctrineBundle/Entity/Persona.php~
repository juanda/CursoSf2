<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\PersonaRepository")
 */
class Persona {

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
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\OneToOne(targetEntity="NIF", inversedBy="persona")
     * @ORM\JoinColumn(name="nif_id", referencedColumnName="id")
     */
    private $nif;

    /**
     * @ORM\ManyToOne(targetEntity="Direccion", inversedBy="personas")
     * @ORM\JoinColumn(name="direccion_id", referencedColumnName="id")
     * */
    private $direccion;

    /**
     * @ORM\ManyToMany(targetEntity="Telefono")
     * @ORM\JoinTable(name="persona_telefono",
     *      joinColumns={@ORM\JoinColumn(name="persona_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="telefono_id", referencedColumnName="id", unique=true)}
     *      )
     * */
    private $telefonos;

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
     * @return Persona
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
     * @return Persona
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
     * Set nif
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\NIF $nif
     * @return Persona
     */
    public function setNif(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\NIF $nif = null) {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\NIF 
     */
    public function getNif() {
        return $this->nif;
    }

    /**
     * Set direccion
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Direccion $direccion
     * @return Persona
     */
    public function setDireccion(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Direccion $direccion = null) {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Direccion 
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->telefonos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add telefonos
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Telefono $telefonos
     * @return Persona
     */
    public function addTelefono(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Telefono $telefonos)
    {
        $this->telefonos[] = $telefonos;
    
        return $this;
    }

    /**
     * Remove telefonos
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Telefono $telefonos
     */
    public function removeTelefono(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Telefono $telefonos)
    {
        $this->telefonos->removeElement($telefonos);
    }

    /**
     * Get telefonos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }
}