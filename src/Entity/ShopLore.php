<?php

namespace App\Entity;

use App\Repository\ShopLoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopLoreRepository::class)]

class ShopLore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $discoveryDate = null;

    public function getDiscoveryDate(): ?\DateTimeImmutable
    {
        return $this->discoveryDate;
    }

    public function setDiscoveryDate(\DateTimeImmutable $discoveryDate): self
    {
        $this->discoveryDate = $discoveryDate;
        return $this;
    }

    #[ORM\Column(length: 255)]
    private ?string $chapter = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(length: 100)]
    private ?string $era = null;

    #[ORM\Column(type: 'text')]
    private ?string $secretsRevealed = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChapter(): ?string
    {
        return $this->chapter;
    }

    public function setChapter(string $chapter): self
    {
        $this->chapter = $chapter;
        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getEra(): ?string
    {
        return $this->era;
    }

    public function setEra(string $era): self
    {
        $this->era = $era;
        return $this;
    }

    public function getSecretsRevealed(): ?string
    {
        return $this->secretsRevealed;
    }

    public function setSecretsRevealed(string $secretsRevealed): self
    {
        $this->secretsRevealed = $secretsRevealed;
        return $this;
    }
    }
    


