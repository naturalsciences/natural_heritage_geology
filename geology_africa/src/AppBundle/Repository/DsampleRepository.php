<?php
// src/AppBundle/Repository/DsampleRepository.php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DsampleRepository extends EntityRepository
{
  public function getLikeQueryBuilder($pattern)
  {
    return $this
      ->createQueryBuilder('c')
      ->where('c.fieldnum LIKE :pattern')
      ->setParameter('pattern', $pattern)
    ;
  }
}
