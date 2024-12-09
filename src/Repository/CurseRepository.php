<?php

namespace App\Repository;

use App\Entity\Curse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Curse>
 *
 * @method Curse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Curse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Curse[]    findAll()
 * @method Curse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Curse::class);
    }

    public function findByRarity(string $rarity): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.rarity = :rarity')
            ->setParameter('rarity', $rarity)
            ->orderBy('c.power', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByPriceRange(float $minPrice, float $maxPrice): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.price >= :minPrice')
            ->andWhere('c.price <= :maxPrice')
            ->setParameter('minPrice', $minPrice)
            ->setParameter('maxPrice', $maxPrice)
            ->orderBy('c.price', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
