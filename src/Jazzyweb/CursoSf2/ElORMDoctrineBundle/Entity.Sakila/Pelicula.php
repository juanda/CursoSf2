<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pelicula
 *
 * @ORM\Table("film")
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\PeliculaRepository")
 */
class Pelicula {

    /**
     * @var integer
     *
     * @ORM\Column(name="film_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=true, length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="release_year", type="string", nullable=true, length=4)
     */
    private $anio;

    /**
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $duracion;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Actor", mappedBy="peliculas")
     */
    private $actores;

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
     * Set anio
     *
     * @param string $anio
     * @return Pelicula
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
    
        return $this;
    }

    /**
     * Get anio
     *
     * @return string 
     */
    public function getAnio()
    {
        return $this->anio;
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
     * Constructor
     */
    public function __construct()
    {
        $this->actores = new \Doctrine\Common\Collections\ArrayCollection();
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
    
    public function __toString() {
        return $this->getTitulo();
    }
}