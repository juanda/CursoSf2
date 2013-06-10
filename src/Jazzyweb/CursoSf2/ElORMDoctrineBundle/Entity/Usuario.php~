<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\UsuarioRepository")
 */
class Usuario {

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
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="seguidores")
     * */
    private $seguidores;

    /**
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="seguidos")
     * @ORM\JoinTable(name="seguimientos",
     *      joinColumns={@ORM\JoinColumn(name="a_usuario_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="b_usuario_id", referencedColumnName="id")}
     *      )
     * */
    private $seguidos;

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
     * Constructor
     */
    public function __construct()
    {
        $this->seguidores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->seguidos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add seguidores
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidores
     * @return Usuario
     */
    public function addSeguidore(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidores)
    {
        $this->seguidores[] = $seguidores;
    
        return $this;
    }

    /**
     * Remove seguidores
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidores
     */
    public function removeSeguidore(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidores)
    {
        $this->seguidores->removeElement($seguidores);
    }

    /**
     * Get seguidores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeguidores()
    {
        return $this->seguidores;
    }

    /**
     * Add seguidos
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidos
     * @return Usuario
     */
    public function addSeguido(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidos)
    {
        $this->seguidos[] = $seguidos;
    
        return $this;
    }

    /**
     * Remove seguidos
     *
     * @param \Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidos
     */
    public function removeSeguido(\Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Usuario $seguidos)
    {
        $this->seguidos->removeElement($seguidos);
    }

    /**
     * Get seguidos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeguidos()
    {
        return $this->seguidos;
    }
}