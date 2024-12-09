<?php

namespace App\Repository;

use App\Entity\ShopLore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShopLore>
 *
 * @method ShopLore|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopLore|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopLore[]    findAll()
 * @method ShopLore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopLoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopLore::class);
    }

    public function findByEra(string $era): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.era = :era')
            ->setParameter('era', $era)
            ->orderBy('l.discoveryDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findLatestChapters(int $limit = 5): array
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.discoveryDate', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
