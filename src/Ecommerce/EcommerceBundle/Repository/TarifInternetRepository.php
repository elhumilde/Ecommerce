<?php

namespace Ecommerce\EcommerceBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TarifInternetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TarifInternetRepository extends EntityRepository
{

    public function saregion(){
        $qb=$this->createQueryBuilder('t')
                 ->select('t.opt1')
                 ->where('t.id = :VAs')->setParameter('VAs','68')
                ->andWhere('t.libOpt1 = :Ls')->setParameter('Ls','Ma Région');
        return $qb->getQuery()->getResult();

    }
    public function plus1region(){
        $qb=$this->createQueryBuilder('t')
            ->select('t.opt1')
            ->where('t.id = :VAs')->setParameter('VAs','69')
            ->andWhere('t.libOpt2 = :Ls')->setParameter('Ls','+1 Région');
        return $qb->getQuery()->getResult();

    }
    public function plus3region(){
        $qb=$this->createQueryBuilder('t')
            ->select('t.opt1')
            ->where('t.id = :VAs')->setParameter('VAs','70')
            ->andWhere('t.libOpt2 = :Ls')->setParameter('Ls','+3 Régions');
        return $qb->getQuery()->getResult();

    }
    public function plus6region(){
        $qb=$this->createQueryBuilder('t')
            ->select('t.opt1')
            ->where('t.id = :VAs')->setParameter('VAs','71')
            ->andWhere('t.libOpt2 = :Ls')->setParameter('Ls','+6 Régions');
        return $qb->getQuery()->getResult();

    }
    public function plus9region(){
        $qb=$this->createQueryBuilder('t')
            ->select('t.opt1')
            ->where('t.id = :VAs')->setParameter('VAs','72')
            ->andWhere('t.libOpt2 = :Ls')->setParameter('Ls','+9 Régions');
        return $qb->getQuery()->getResult();

    }
}
