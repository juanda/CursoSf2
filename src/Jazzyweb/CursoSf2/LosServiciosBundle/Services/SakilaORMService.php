<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Services;


use Doctrine\Common\Persistence\ObjectRepository;


class SakilaORMService {

    private $em;

    public function __construct($em){

        $this->em = $em;
        $this->repoActor = $this->em->getRepository('Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Actor');
        $this->repoPelicula = $this->em->getRepository('Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula');
    }

    public function getActors() {

        $actors = $this->repoActor->findAll();

        return $actors;
    }

    public function getActorById($id) {

        if (!$id) {
            throw new Exception("Falta el parámetro $id");
        }

        $actor = $this->repoActor->find($id);

        return $actor;
    }

    public function getActorsByName($name) {
        if (!$name) {
            throw new Exception("Falta el parámetro $name");
        }

        $actors = $this->repoActor->findByName($name);

        return $actors;
    }

    public function getFilmById($id) {
        if (!$id) {
            throw new Exception("Falta el parámetro $id");
        }

        $pelicula = $this->repoPelicula->find($id);

        return $pelicula;
    }

    public function getFilmsOfActor($id) {

        if (!$id) {
            throw new Exception("Falta el parámetro $id");
        }

        // ...
    }

}