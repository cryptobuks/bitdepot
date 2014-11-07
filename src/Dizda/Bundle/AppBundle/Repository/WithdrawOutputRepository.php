<?php

namespace Dizda\Bundle\AppBundle\Repository;

use Dizda\Bundle\AppBundle\Entity\Application;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * WithdrawOutputRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WithdrawOutputRepository extends EntityRepository
{

    public function getWhereWithdrawIsNull(Application $application)
    {
        $qb = $this->createQueryBuilder('wo')
            ->andWhere('wo.application = :application')
            ->andWhere('wo.withdraw is NULL')
            ->andWhere('wo.isAccepted = true')
            ->setParameter('application', $application)
        ;

        return $qb->getQuery()->execute();
    }

}
