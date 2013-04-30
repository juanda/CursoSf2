<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Direccion{
    
    
    /**
     * @Assert\NotBlank()
     */
    private $calle;
    
    /**
     * 
     * @Assert\Type(type="numeric", message="El valor {{ value }} no es un {{ type }} válido.")
     *
     */
    private $number;
  
    public function getCalle() {
        return $this->calle;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
        return $this;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
        return $this;
    }




}
