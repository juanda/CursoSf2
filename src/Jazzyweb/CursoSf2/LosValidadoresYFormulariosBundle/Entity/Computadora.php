<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Computadora {

    private $nombre;
    private $ubicacion;
    private $so;
    private $ip;
    private $mac;
    private $ram;
    private $estaEnUso;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
        return $this;
    }

    public function getSo() {
        return $this->so;
    }

    public function setSo($so) {
        $this->so = $so;
        return $this;
    }

    public function getIp() {
        return $this->ip;
    }

    public function setIp($ip) {
        $this->ip = $ip;
        return $this;
    }

    public function getMac() {
        return $this->mac;
    }

    public function setMac($mac) {
        $this->mac = $mac;
        return $this;
    }

    public function getRam() {
        return $this->ram;
    }

    public function setRam($ram) {
        $this->ram = $ram;
        return $this;
    }

    public function getEstaEnUso() {
        return $this->estaEnUso;
    }

    public function setEstaEnUso($estaEnUso) {
        $this->estaEnUso = $estaEnUso;
        return $this;
    }

}