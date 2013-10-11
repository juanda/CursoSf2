<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Persona;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Direccion;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2ORMDoctrineBundle:Default:index.html.twig');
    }

    public function persistirAction() {

        $em = $this->getDoctrine()->getManager();

        $personas = array();

        $personas[0] = new Persona();
        $personas[0]->setNombre('Alfredo');
        $personas[0]->setApellidos('Landa');

        $em->persist($personas[0]);

        $personas[1] = new Persona();
        $personas[1]->setNombre('Alberto');
        $personas[1]->setApellidos('Einstein');

        $em->persist($personas[1]);

        $personas[2] = new Persona();
        $personas[2]->setNombre('Baruj');
        $personas[2]->setApellidos('Espinoza');

        $em->persist($personas[2]);

        $em->flush();

        return $this->render('JCSf2ORMDoctrineBundle:Default:persistir.html.twig', array('personas' => $personas));
    }

    public function modificarAction() {

        $em = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()
            ->getRepository('JCSf2ORMDoctrineBundle:Persona');

        $id = 1;
        $persona = $repository->find($id);


        if (!$persona) {
            throw $this->createNotFoundException('No existe la persona con id ' . $id);
        }

        $personaCopy = clone $persona;

        $persona->setNombre('Gael');

        $em->persist($persona);

        $em->flush();

        return $this->render('JCSf2ORMDoctrineBundle:Default:modificar.html.twig', array(
            'persona' => $persona,
            'personaCopy' => $personaCopy));
    }

    public function persistirRelacionesAction() {

        $em = $this->getDoctrine()->getManager();

        $deletePersonas = $em->createQuery('DELETE JCSf2ORMDoctrineBundle:Persona');
        $deleteDirecciones = $em->createQuery('DELETE JCSf2ORMDoctrineBundle:Direccion');
        $deletePersonas->execute();
        $deleteDirecciones->execute();

        $p1 = new Persona();
        $p1->setNombre('Juan');
        $p1->setApellidos('Palomo');

        $p2 = new Persona();
        $p2->setNombre('Pepe');
        $p2->setApellidos('Pinto');

        $p3 = new Persona();
        $p3->setNombre('Rafael');
        $p3->setApellidos('García');

        $d1 = new Direccion();
        $d1->setCalle('c/ Parras');
        $d1->setNumero(20);

        // Relacionando desde la parte propietaria
        $p1->setDireccion($d1);

        // Relacionando desde la parte inversa (no persiste)
        $d1->addPersona($p2);

        // Relacionando correctamente, de cara a la persistencia y a los objetos
        $p3->setDireccion($d1);
        $d1->addPersona($p3);

        $em->persist($d1);
        $em->persist($p1);
        $em->persist($p2);
        $em->persist($p3);
        ;

        $em->flush();

        $repoPersona = $em->getRepository('JCSf2ORMDoctrineBundle:Persona');

        $personas = $repoPersona->findAll();

        return $this->render('JCSf2ORMDoctrineBundle:Default:persistirRelaciones.html.twig', array(
            'personas' => $personas));

    }

    private function  echoPersona($persona){

        $calle = ($persona->getDireccion() instanceof Direccion)? $persona->getDireccion()->getCalle() : '';
        $numero = ($persona->getDireccion() instanceof Direccion)? $persona->getDireccion()->getNumero() : '';

        return $persona->getNombre() . ' vive en ' . $calle . ' ' . $numero;
    }

    public function dqlAction() {

        $em = $this->getDoctrine()->getManager();

        // Todos los actores cuyo nombre comienza por 'A'
        $queryActores = $em->createQuery(
            'SELECT a FROM Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Actor a WHERE a.nombre LIKE :patron'
        )->setParameter('patron', 'A%');

        $actores = $queryActores->getResult();


        // Todas las películas del actor con id=1
        $queryPeliculas = $em->createQuery(
            'SELECT p FROM Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula p
             JOIN p.actores a
             WHERE a.id = :actor_id'
        )->setParameter('actor_id', 1);

        $peliculas = $queryPeliculas->getResult();

        // Todas las películas en las que hay algún actor cuyo nombre es como JOHN%
        $queryPeliculas2 = $em->createQuery(
            'SELECT p FROM Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula p
             JOIN p.actores a
             WHERE a.nombre LIKE :patron'
        )->setParameter('patron', 'JOHN%');

        // Todas las películas en las que hay algún actor cuyo nombre es como JOHN%
        // versión fetched join
//        $queryPeliculas2 = $em->createQuery(
//                        'SELECT p,a FROM Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula p
//                         JOIN p.actores a
//                         WHERE a.nombre LIKE :patron'
//                )->setParameter('patron', 'J%');
//
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
            ->getRepository('Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Actor');

        $actores = $repoActores->findByNombreLike("A%");

        $repoPeliculas = $this->getDoctrine()
            ->getRepository('Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Pelicula');

        $peliculas = $repoPeliculas->findByActorId(1);
        $peliculas2 = $repoPeliculas->findByActorNombreLike("%JOHN%");


        return $this->render('JCSf2ORMDoctrineBundle:Default:dql.html.twig', array(
            'actores' => $actores,
            'peliculas' => $peliculas,
            'peliculas2' => $peliculas2
        ));
    }


    public function sqlDbalAction() {

        $conn = $this->getDoctrine()->getConnection();
        $sql = "SELECT * FROM actor";
        $stmt = $conn->query($sql); // Simple, but has several drawbacks

        $actores = array();

        while ($row = $stmt->fetch()) {
            $actores[] = array(
                'nombre' => $row['first_name'],
                'apellidos' => $row['last_name']);
        }

        return $this->render('JCSf2ORMDoctrineBundle:Default:sqldbal.html.twig', array('actores' => $actores));
    }
}
