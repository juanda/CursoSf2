<?php

namespace Jazzyweb\CursoSf2\ElORMDoctrineBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ActorRepository extends EntityRepository {

    public function findByNombreLike($patron) {
        
        // Todos los actores cuyo nombre es como $patron
        $queryActores = $this->getEntityManager()->createQuery(
                        'SELECT a FROM JCSf2ORMDoctrineBundle:Actor a WHERE a.nombre LIKE :patron'
                )->setParameter('patron', $patron);
            

        return $queryActores->getResult();
    }       
}
