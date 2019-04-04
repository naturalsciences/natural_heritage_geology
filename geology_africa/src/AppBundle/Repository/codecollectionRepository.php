<?php
// src/AppBundle/Repository/codecollectionRepository.php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class codecollectionRepository extends EntityRepository
{
   public function findAllCollOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
				"SELECT codecollection FROM AppBundle:codecollection p where p.zoneutilisation LIKE 'sample%' ORDER BY p.codecollection ASC";
            )
            ->getResult();
    }

}
