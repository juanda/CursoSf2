<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila;

use Doctrine\ORM\EntityRepository;

/**
 * ActorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActorRepository extends EntityRepository {

    public function findByNombreLike($patron) {
        
        // Todos los actores cuyo nombre es como $patron
        $queryActores = $this->getEntityManager()->createQuery(
                        'SELECT a FROM Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity\Sakila\Actor a WHERE a.nombre LIKE :patron'
                )->setParameter('patron', $patron);
            

        return $queryActores->getResult();
    }       
}