<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class EntidadEclectica {

    /**
     * @var string
     * 
     * @Assert\NotBlank()
     * @Assert\Type(type="string", message="El valor {{ value }} no es un {{ type }} válido.")
     * @Assert\Length(
     *      min = "4",
     *      max = "50",
     *      minMessage = "El nombre debe tener al menos {{ limit }} caracteres",
     *      maxMessage = "El nombre no puede tener más de {{ limit }} caracteres"
     * )
     * 
     * @Assert\Regex(
     *     pattern="/^[\w-]+$/",
     *     message="El nombre no puede contener más que caracteres alfanuméricos y guiones")
     */
    private $nombre;

    /**
     * @var string
     * 
     * @Assert\Length(      
     *      max = "255",      
     *      maxMessage = "El nombre no puede tener más de {{ limit }} caracteres"
     * )
     */
    private $descripcion;

    /**
     * @var string 
     * 
     * @Assert\Email(
     *     message = "El email '{{ value }}' no es un email válido",
     *     checkMX = true)
     */
    private $email;

    /**
     * @var string 
     * 
     * @Assert\Url(message = "La Url '{{ value }}' no es válida")
     */
    private $url;

    /**
     * @var string 
     * 
     * @Assert\Ip(message = "La IP '{{ value }}' no es válida")
     */
    private $ip;

    /**
     * @var integer
     * 
     * @Assert\Range(
     *      min = "1",
     *      max = "10",
     *      minMessage = "La puntuación más baja es 1",
     *      maxMessage = "la puntuación más alta es 10"
     * )
     */
    private $puntuacion;

    /**
     * @var date
     * 
     * @Assert\Date(message="La fecha no es válida")
     */
    private $fecha;

    /**
     * @var string
     * 
     * @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "El fichero no es un PDF válido"
     * )
     */
    private $fichero;

    // Getters and setters

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function getIp() {
        return $this->ip;
    }

    public function setIp($ip) {
        $this->ip = $ip;
        return $this;
    }

    public function getPuntuacion() {
        return $this->puntuacion;
    }

    public function setPuntuacion($puntuacion) {
        $this->puntuacion = $puntuacion;
        return $this;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
        return $this;
    }

    public function getFichero() {
        return $this->fichero;
    }

    public function setFichero($fichero) {
        $this->fichero = $fichero;
        return $this;
    }

    public function __toString() {
        $o = "nombre: " . $this->getNombre();
        $o .= '<br/>';
        $o .= "descripción: " . $this->getDescripcion();
        $o .= '<br/>';
        $o .= "email: " . $this->getEmail();
        $o .= '<br/>';
        $o .= "url: " . $this->getUrl();
        $o .= '<br/>';
        $o .= "Ip: " . $this->getIp();
        $o .= '<br/>';
        $o .= "Puntuacion: " . $this->getPuntuacion();
        $o .= '<br/>';
        
        $o .= "Fichero: " . $this->getFichero();
        $o .= '<br/>';
        


        return $o;
    }

}
