<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Persona{
    
    
    /**
     * @Assert\NotBlank()
     */
    private $nombre;
    
    /**
     * @Assert\Type(type="Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Direccion")
     */
    private $direccion;

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
        return $this;
    }

        public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }


}
