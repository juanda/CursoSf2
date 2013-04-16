<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Services;

class EjemploService{
    
    public function __construct($p1, $p2) {
        $this->p1 = $p1;
        $this->p2 = $p2;        
    }
    
    public function diHola(){
        
        return "EjemploServicio. p1=".$this->p1.",p2=".$this->p2;        
    }   
}
