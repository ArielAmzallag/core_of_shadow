<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function findByPurchaseHistory(string $itemType): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('JSON_CONTAINS(u.purchaseHistory, :itemType) = 1')
            ->setParameter('itemType', json_encode(['type' => $itemType]))
            ->getQuery()
            ->getResult();
    }

    public function findTopSpenders(int $limit = 10): array
    {
        return $this->createQueryBuilder('u')
            ->orderBy('u.goldBalance', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
