<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\CategoriaRepository")
 */
class Categoria {

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
     * @ORM\OneToMany(targetEntity="Categoria", mappedBy="padre")
     */
    private $hija;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="hija")
     * @ORM\JoinColumn(name="padre_id", referencedColumnName="id")
     * */
    private $padre;

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
     * @return Categoria
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
     * Constructor
     */
    public function __construct()
    {
        $this->hija = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add hija
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria $hija
     * @return Categoria
     */
    public function addHija(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria $hija)
    {
        $this->hija[] = $hija;
    
        return $this;
    }

    /**
     * Remove hija
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria $hija
     */
    public function removeHija(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria $hija)
    {
        $this->hija->removeElement($hija);
    }

    /**
     * Get hija
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHija()
    {
        return $this->hija;
    }

    /**
     * Set padre
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria $padre
     * @return Categoria
     */
    public function setPadre(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria $padre = null)
    {
        $this->padre = $padre;
    
        return $this;
    }

    /**
     * Get padre
     *
     * @return \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria 
     */
    public function getPadre()
    {
        return $this->padre;
    }
}