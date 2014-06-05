<?php

namespace Vivait\CRMBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CustomerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomerRepository extends EntityRepository
{
    public function listAll()
    {
        return $this->createQueryBuilder('c')
            ->addSelect('a')
            ->leftJoin('c.addresses','a')
            ->getQuery()
            ->getResult();
    }


    public function listAllOrderBySurname() {
        return $this->createQueryBuilder('c')
            ->addSelect('a')
            ->leftJoin('c.addresses','a')
            ->orderBy('c.surname')
            ->getQuery()
            ->getResult();
    }
}
