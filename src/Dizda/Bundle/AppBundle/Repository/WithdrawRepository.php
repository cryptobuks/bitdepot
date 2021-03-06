<?php

namespace Dizda\Bundle\AppBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * WithdrawRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WithdrawRepository extends EntityRepository
{

    /**
     * @return ArrayCollection
     */
    public function getUnsignedWithdraw()
    {
        $qb = $this->createQueryBuilder('w')
            ->innerJoin('w.withdrawInputs', 'wi')
            ->innerJoin('w.withdrawOutputs', 'wo')
//            ->andWhere('w.withdrawedAt is NULL')
            ->andWhere('wo.isAccepted = true')
            ->setMaxResults(10)
        ;

        return $qb->getQuery()->execute();
    }

    /**
     * @return ArrayCollection
     */
    public function getWithdraws(array $filters)
    {
        $qb = $this->createQueryBuilder('w')
//            ->innerJoin('w.keychain', 'k')
            ->innerJoin('w.withdrawInputs', 'wi')
            ->innerJoin('w.withdrawOutputs', 'wo')
            ->andWhere('wo.isAccepted = true')
            ->andWhere('wo.application = :application')
            ->groupBy('w.id')
            ->orderBy('w.createdAt', 'DESC')
            ->setParameter('application', $filters['application_id'])
            ->setMaxResults(10)
        ;

        return $qb->getQuery()->execute();
    }

    /**
     * @return mixed
     */
    public function getChangeAddressesMonitored()
    {
        $qb = $this->createQueryBuilder('w')
            ->join('w.changeAddress', 'a')
            ->leftJoin('a.transactions', 'adt')
            ->where('w.changeAddress is NOT NULL')
            ->andWhere('adt.id is NULL')
        ;

        return $qb->getQuery()->execute();
    }
}
