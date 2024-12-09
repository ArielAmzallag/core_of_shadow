<?php

namespace App\Entity;

use App\Repository\ShopRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopRepository::class)]
class Shop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private float $goldBalance = 0.0;

    #[ORM\Column(type: 'json')]
    private array $purchaseHistory = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoldBalance(): float
    {
        return $this->goldBalance;
    }

    public function setGoldBalance(float $goldBalance): self
    {
        $this->goldBalance = $goldBalance;
        return $this;
    }

    public function getPurchaseHistory(): array
    {
        return $this->purchaseHistory;
    }

    public function addToPurchaseHistory(array $purchase): self
    {
        $this->purchaseHistory[] = $purchase;
        return $this;
    }
}
