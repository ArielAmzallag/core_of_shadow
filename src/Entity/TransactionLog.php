<?php

namespace App\Entity;

use App\Repository\TransactionLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionLogRepository::class)]
class TransactionLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $userId;

    #[ORM\Column]
    private float $amount;

    #[ORM\Column]
    private \DateTime $timestamp;

    #[ORM\Column(length: 45)]
    private string $ipAddress;

    public function __construct(int $userId, float $amount, \DateTime $timestamp, string $ipAddress)
    {
        $this->userId = $userId;
        $this->amount = $amount;
        $this->timestamp = $timestamp;
        $this->ipAddress = $ipAddress;
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }
}
