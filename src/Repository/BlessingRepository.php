<?php

namespace App\Repository;

use App\Entity\Blessing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Blessing>
 *
 * @method Blessing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blessing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blessing[]    findAll()
 * @method Blessing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlessingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blessing::class);
    }

    public function findByRarity(string $rarity): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.rarity = :rarity')
            ->setParameter('rarity', $rarity)
            ->orderBy('b.power', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByPriceRange(float $minPrice, float $maxPrice): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.price >= :minPrice')
            ->andWhere('b.price <= :maxPrice')
            ->setParameter('minPrice', $minPrice)
            ->setParameter('maxPrice', $maxPrice)
            ->orderBy('b.price', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
