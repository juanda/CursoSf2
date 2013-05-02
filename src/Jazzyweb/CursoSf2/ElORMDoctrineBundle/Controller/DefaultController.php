<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Actor;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Pelicula;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Categoria;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Persona;
use Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Direccion;

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

        $p = new Pelicula();
        $p->setTitulo('El algo');

        $em->persist($p);


        $em->flush();

        return $this->render('JCSf2ORMDoctrineBundle:Default:persistir.html.twig', array('actores' => $actores));
    }

    public function modificarAction() {

        $em = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()
                ->getRepository('JCSf2ORMDoctrineBundle:Actor');

        $id = 1;
        $actor = $repository->find($id);


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
        
        // Todas las películas en las que hay algún actor cuyo nombre es como JOHN%
        // versión fetched join
//        $queryPeliculas2 = $em->createQuery(
//                        'SELECT p,a FROM JCSf2ORMDoctrineBundle:Pelicula p 
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

    public function crearArbolCategoriasAction() {

        $em = $this->getDoctrine()->getManager();

        $c1 = new Categoria();
        $c1->setNombre('c1');
        $em->persist($c1);

        $c2 = new Categoria();
        $c2->setNombre('c2');
        $em->persist($c2);

        $c3 = new Categoria();
        $c3->setNombre('c3');
        $em->persist($c3);

        $c4 = new Categoria();
        $c4->setNombre('c4');
        $em->persist($c4);

        $c5 = new Categoria();
        $c5->setNombre('c5');
        $em->persist($c5);

        $c6 = new Categoria();
        $c6->setNombre('c6');
        $em->persist($c6);

        $c7 = new Categoria();
        $c7->setNombre('c7');
        $em->persist($c7);

        $c8 = new Categoria();
        $c8->setNombre('c8');
        $em->persist($c8);

        $c2->setPadre($c1);
        $c3->setPadre($c1);
        $c4->setPadre($c1);

        $c5->setPadre($c2);
        $c6->setPadre($c2);
        $c7->setPadre($c5);
        $c8->setPadre($c5);
        $c8->setPadre($c2);


        $em->flush();

        exit;
    }

    public function crearRedSeguidoresAction() {

        $em = $this->getDoctrine()->getManager();

        $u1 = new Usuario();
        $u1->setNombre('u1');
        $em->persist($u1);

        $u2 = new Usuario();
        $u2->setNombre('u2');
        $em->persist($u2);

        $u3 = new Usuario();
        $u3->setNombre('u3');
        $em->persist($u3);

        $u4 = new Usuario();
        $u4->setNombre('u4');
        $em->persist($u4);
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

    public function persistirRelacionesAction() {

        $em = $this->getDoctrine()->getEntityManager();

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

        $em->flush();

        // Recupero datos desde los objetos        

        echo $p1->getNombre() . ' vive en ' . $p1->getDireccion()->getCalle() . ' ' . $p1->getDireccion()->getNumero();
        echo '<br/>';

        // Este falla por que no se ha asociado la dirección a la persona 2
//        echo $p2->getNombre(). ' vive en ' . $p2->getDireccion()->getCalle() . ' ' . $p2->getDireccion()->getNumero();;
//        echo '<br/>';

        echo $p3->getNombre() . ' vive en ' . $p3->getDireccion()->getCalle() . ' ' . $p3->getDireccion()->getNumero();
        ;
        echo '<br/>';

        echo '<hr/>';
        echo "En " . $d1->getCalle() . ' ' . $d1->getNumero() . ' viven:';
        echo '<br/>';
        $personas = $d1->getPersonas();
        foreach ($personas as $p) {
            echo $p->getNombre();
            echo '<br/>';
        }

        exit;
    }

    public function recuperarRelacionesAction() {
        // Recupero datos desde el repositorio

        $repoPersonas = $this->getDoctrine()->getRepository('JCSf2ORMDoctrineBundle:Persona');
        $repoDirecciones = $this->getDoctrine()->getRepository('JCSf2ORMDoctrineBundle:Direccion');

        $personas2 = $repoPersonas->findAll();
        $direcciones = $repoDirecciones->findAll();

        echo '<hr/>';
        echo "Obteniendo datos desde el repositorio<br/>";
        echo "Todas las personas<br/>";
        echo "------------------<br/>";

        foreach ($personas2 as $p) {
            $d = $p->getDireccion();
            if ($d instanceof Direccion) {
                echo $p->getNombre() . ' vive en ' . $d->getCalle() . ' ' . $d->getNumero();
                echo '<br/>';
                echo "Y en " . $d->getCalle() . ' ' . $d->getNumero() . ' viven:<br/>';

                foreach ($d->getPersonas() as $p) {
                    echo $p->getNombre();
                    echo '<br/>';
                }
            } else {
                echo $p->getNombre() . ' no tiene direccion asociada<br/>';
            }
            
            echo '<br/>';
        }

        echo '<hr/>';
        echo "Todas las direcciones<br/>";
        echo "---------------------<br/>";
        foreach ($direcciones as $d) {
            $personas3 = $d->getPersonas();
            echo "Desde ". $d->getCalle() . ' ' . $d->getNumero() . ':<br/>'; 
            foreach ($personas3 as $p) {
                if ($p->getDireccion() instanceof Direccion) {
                    echo $p->getNombre() . ' vive en ' . $p->getDireccion()->getCalle() . ' ' . $p->getDireccion()->getNumero();
                    echo '<br/>';
                } else {
                    echo $p->getNombre() . ' no tiene asociada direccion<br/>';
                }
            }
        }

        exit;
    }

}
