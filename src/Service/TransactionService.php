<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\TransactionLog;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;

class TransactionService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CsrfTokenManagerInterface $csrfTokenManager,
        private Security $security
    ) {}

    public function processGoldTransaction(User $user, float $amount, string $tokenString): array
    {
        $token = new CsrfToken('gold_transaction', $tokenString);
        
        if (!$this->validateToken($token)) {
            return ['success' => false, 'message' => 'Invalid transaction token'];
        }

        if (!$this->validateAmount($amount)) {
            return ['success' => false, 'message' => 'Invalid amount'];
        }

        try {
            $this->entityManager->beginTransaction();
            $user->setGoldBalance($user->getGoldBalance() + $amount);
            $this->logTransaction($user, $amount);
            $this->entityManager->flush();
            $this->entityManager->commit();
            
            return ['success' => true, 'message' => 'Gold added successfully'];
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            return ['success' => false, 'message' => 'Transaction failed'];
        }
    }

    private function validateToken(CsrfToken $token): bool
    {
        return $this->csrfTokenManager->isTokenValid($token);
    }

    private function validateAmount(float $amount): bool
    {
        return $amount > 0 && $amount <= 1000000;
    }

    private function logTransaction(User $user, float $amount): void
    {
        // Implementation of secure transaction logging
        $this->entityManager->persist(new TransactionLog(
            $user->getId(),
            $amount,
            new \DateTime(),
            $_SERVER['REMOTE_ADDR']
        ));
    }
}
