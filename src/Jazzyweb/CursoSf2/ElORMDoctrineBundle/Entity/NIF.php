<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NIF
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\NIFRepository")
 */
class NIF
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="letra", type="string", length=1)
     */
    private $letra;

    /**
     * @var string
     *
     * @ORM\Column(name="equipo", type="string", length=255)
     */
    private $equipo;
    
    /**
     * @ORM\OneToOne(targetEntity="Persona", mappedBy="nif")
     * 
     */
    private $persona;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return NIF
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set letra
     *
     * @param string $letra
     * @return NIF
     */
    public function setLetra($letra)
    {
        $this->letra = $letra;
    
        return $this;
    }

    /**
     * Get letra
     *
     * @return string 
     */
    public function getLetra()
    {
        return $this->letra;
    }

    /**
     * Set equipo
     *
     * @param string $equipo
     * @return NIF
     */
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;
    
        return $this;
    }

    /**
     * Get equipo
     *
     * @return string 
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set persona
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Persona $persona
     * @return NIF
     */
    public function setPersona(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;
    
        return $this;
    }

    /**
     * Get persona
     *
     * @return \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }
}