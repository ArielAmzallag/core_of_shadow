<?php

namespace App\Repository;

use App\Entity\TransactionLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TransactionLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransactionLog::class);
    }

    public function findByUserId(int $userId): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.userId = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('t.timestamp', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
