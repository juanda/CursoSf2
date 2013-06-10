<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pelicula
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\PeliculaRepository")
 */
class Pelicula
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
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion",nullable=true, type="string", length=255)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion",nullable=true, type="integer")
     */
    private $duracion;


    /**
     * @ORM\ManyToMany(targetEntity="Actor", mappedBy="peliculas")
     * 
     */
    private $actores;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actores = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set titulo
     *
     * @param string $titulo
     * @return Pelicula
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Pelicula
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return Pelicula
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    
        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Add actores
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Actor $actores
     * @return Pelicula
     */
    public function addActore(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Actor $actores)
    {
        $this->actores[] = $actores;
    
        return $this;
    }

    /**
     * Remove actores
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Actor $actores
     */
    public function removeActore(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Actor $actores)
    {
        $this->actores->removeElement($actores);
    }

    /**
     * Get actores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActores()
    {
        return $this->actores;
    }
}