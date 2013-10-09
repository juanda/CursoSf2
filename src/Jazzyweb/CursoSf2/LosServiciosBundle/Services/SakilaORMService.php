<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Services;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

class SakilaORMService {

    private $em;

    public function __construct(EntityManagerInterface $em){

        $this->em = $em;
        $this->repoActor = $this->em->getRepository('JCSf2LosServiciosBundle:Actor');
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

        // ...
    }

    public function getFilmsOfActor($id) {

        if (!$id) {
            throw new Exception("Falta el parámetro $id");
        }

        // ...
    }

}