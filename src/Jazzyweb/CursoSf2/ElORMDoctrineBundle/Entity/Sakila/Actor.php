<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actor
 *
 * @ORM\Table(name="actor")
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\ActorRepository")
 */
class Actor {

    /**
     * @var integer
     *
     * @ORM\Column(name="actor_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="datetime")
     */
    private $actualizacion;
    
    /**
     * @ORM\ManyToMany(targetEntity="Pelicula", inversedBy="actores")
     * @ORM\JoinTable(name="film_actor",
     *                joinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="actor_id")},
     *                inverseJoinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="film_id", unique=true)})
     */
    private $peliculas;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Actor
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Actor
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set actualizacion
     *
     * @param \DateTime $actualizacion
     * @return Actor
     */
    public function setActualizacion($actualizacion)
    {
        $this->actualizacion = $actualizacion;
    
        return $this;
    }

    /**
     * Get actualizacion
     *
     * @return \DateTime 
     */
    public function getActualizacion()
    {
        return $this->actualizacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->peliculas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add peliculas
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula $peliculas
     * @return Actor
     */
    public function addPelicula(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula $peliculas)
    {
        $this->peliculas[] = $peliculas;
    
        return $this;
    }

    /**
     * Remove peliculas
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula $peliculas
     */
    public function removePelicula(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula $peliculas)
    {
        $this->peliculas->removeElement($peliculas);
    }

    /**
     * Get peliculas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPeliculas()
    {
        return $this->peliculas;
    }
}