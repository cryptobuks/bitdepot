<?php

namespace Dizda\Bundle\AppBundle\Repository;

use Dizda\Bundle\AppBundle\Entity\Keychain;
use Dizda\Bundle\AppBundle\Entity\Transaction;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * TransactionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TransactionRepository extends EntityRepository
{
    /**
     * @return mixed
     */
    public function getSpendableTransactions(Keychain $keychain)
    {
        $qb = $this->createQueryBuilder('at')
            ->join('at.address', 'a')
            ->join('a.application', 'app')
            ->andWhere('app.keychain = :keychain')
            ->andWhere('at.type = :type')
            ->andWhere('at.withdraw is NULL')
            ->andWhere('at.isSpent = false')
            ->setParameter('keychain', $keychain)
            ->setParameter('type', Transaction::TYPE_IN)
        ;

        return $qb->getQuery()->execute();
    }
}
