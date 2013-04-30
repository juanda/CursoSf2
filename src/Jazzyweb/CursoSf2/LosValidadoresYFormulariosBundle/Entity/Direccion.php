<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Direccion{
    
    
    /**
     * @Assert\NotBlank()
     */
    private $calle;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="numeric", message="El valor {{ value }} no es un {{ type }} válido.")
     *
     */
    private $numero;
  
    public function getCalle() {
        return $this->calle;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
        return $this;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
        return $this;
    }




}
