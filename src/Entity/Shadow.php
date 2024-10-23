<?php

namespace App\Entity;

use App\Entity\Trait\ShadowMetadataTrait;
use App\Repository\ShadowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShadowRepository::class)]
class Shadow
{
    use ShadowMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column(type: 'text')]
    private ?string $hiddenLore = null;

    // Basic getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getHiddenLore(): ?string
    {
        return $this->hiddenLore;
    }

    public function setHiddenLore(string $hiddenLore): self
    {
        $this->hiddenLore = $hiddenLore;
        return $this;
    }
}
