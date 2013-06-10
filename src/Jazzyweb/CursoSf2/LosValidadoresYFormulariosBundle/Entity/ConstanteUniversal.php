<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ConstanteUniversal {
    
    /**
     *
     * @Assert\Length(      
     *      max = "255",      
     *      maxMessage = "El nombre no puede tener más de {{ limit }} caracteres"
     * )
     * @Assert\NotBlank(message = "No se puede dejar en blanco")
     *
     */
    private $nombre;
    
    /**
     *
     * @Assert\Length(      
     *      max = "20",      
     *      maxMessage = "El nombre no puede tener más de {{ limit }} caracteres"
     * )
     * @Assert\NotBlank(message = "No se puede dejar en blanco")
     */
    private $unidad;
    
    /**
     *
     * @Assert\NotBlank(message = "No se puede dejar en blanco")
     *
     * @Assert\Type(type="numeric", message="El valor {{ value }} no es un {{ type }} válido.")
     *
     */
    private $valor;
    
    public $file;
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function setUnidad($unidad) {
        $this->unidad = $unidad;
        return $this;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
        return $this;
    }




}

?>
