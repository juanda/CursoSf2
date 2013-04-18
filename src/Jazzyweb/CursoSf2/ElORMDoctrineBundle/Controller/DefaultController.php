<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Actor;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2ORMDoctrineBundle:Default:index.html.twig');
    }

    public function persistirAction() {

        $em = $this->getDoctrine()->getManager();

        $actores = array();

        $actores[0] = new Actor();
        $actores[0]->setNombre('NICK');
        $actores[0]->setApellidos('WAHLBERG');
        $actores[0]->setActualizacion(new \DateTime());

        $em->persist($actores[0]);

        $actores[1] = new Actor();
        $actores[1]->setNombre('JENNIFER');
        $actores[1]->setApellidos('DAVIS');
        $actores[1]->setActualizacion(new \DateTime());

        $em->persist($actores[1]);

        $actores[2] = new Actor();
        $actores[2]->setNombre('JOHNNY');
        $actores[2]->setApellidos('LOLLOBRIGIDA');
        $actores[2]->setActualizacion(new \DateTime());

        $em->persist($actores[2]);

        $em->flush();

        return $this->render('JCSf2ORMDoctrineBundle:Default:persistir.html.twig', array('actores' => $actores));
    }

    public function modificarAction() {

        $em = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()
                ->getRepository('JCSf2ORMDoctrineBundle:Actor');

        $actor = $repository->find(1);


        if (!$actor) {
            throw $this->createNotFoundException('No existe el actor con id ' . $id);
        }

        $actorCopy = clone $actor;

        $actor->setNombre('GAEL');

        $em->persist($actor);

        $em->flush();

        return $this->render('JCSf2ORMDoctrineBundle:Default:modificar.html.twig', array(
                    'actor' => $actor,
                    'actorCopy' => $actorCopy));
    }

    public function dqlAction() {

        $em = $this->getDoctrine()->getManager();

        // Todos los actores cuyo nombre comienza por 'A'
        $queryActores = $em->createQuery(
                        'SELECT a FROM JCSf2ORMDoctrineBundle:Actor a WHERE a.nombre LIKE :patron'
                )->setParameter('patron', 'A%');

        $actores = $queryActores->getResult();


        // Todas las películas del actor con id=1
        $queryPeliculas = $em->createQuery(
                        'SELECT p FROM JCSf2ORMDoctrineBundle:Pelicula p 
                         JOIN p.actores a
                         WHERE a.id = :actor_id'
                )->setParameter('actor_id', 1);

        $peliculas = $queryPeliculas->getResult();

        // Todas las películas en las que hay algún actor cuyo nombre es como JOHN%
        $queryPeliculas2 = $em->createQuery(
                        'SELECT p FROM JCSf2ORMDoctrineBundle:Pelicula p 
                         JOIN p.actores a
                         WHERE a.nombre LIKE :patron'
                )->setParameter('patron', 'JOHN%');

        $peliculas2 = $queryPeliculas2->getResult();

        return $this->render('JCSf2ORMDoctrineBundle:Default:dql.html.twig', array(
                    'actores' => $actores,
                    'peliculas' => $peliculas,
                    'peliculas2' => $peliculas2
        ));
    }

    public function dqlEnRepositorioAction() {
        
        $em = $this->getDoctrine()->getManager();

        $repoActores = $this->getDoctrine()
                ->getRepository('JCSf2ORMDoctrineBundle:Actor');

        $actores = $repoActores->findByNombreLike("%JOHN%");
        
        $repoPeliculas = $this->getDoctrine()
                ->getRepository('JCSf2ORMDoctrineBundle:Pelicula');
        
        $peliculas = $repoPeliculas->findByActorId(1);
        $peliculas2 = $repoPeliculas->findByActorNombreLike("%JOHN%");
        
        
        return $this->render('JCSf2ORMDoctrineBundle:Default:dql.html.twig', array(
                    'actores' => $actores,
                    'peliculas' => $peliculas,
                    'peliculas2' => $peliculas2
        ));
        
    }

}
