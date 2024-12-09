<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
  #[ORM\Entity(repositoryClass: UserRepository::class)]
  #[ORM\Table(name: '`user`')]
  class User implements UserInterface, PasswordAuthenticatedUserInterface
  {
      #[ORM\Id]
      #[ORM\GeneratedValue]
      #[ORM\Column]
      private ?int $id = null;

      #[ORM\Column(length: 180, unique: true)]
      private ?string $email = null;

      #[ORM\Column]
      private array $roles = [];

      #[ORM\Column]
      private ?string $password = null;

      #[ORM\Column(length: 255)]
      private ?string $username = null;

      #[ORM\Column(length: 255)]
      private ?string $quantumSignature = null;

      #[ORM\Column]
      private ?\DateTimeImmutable $initiationDate = null;

      #[ORM\Column(length: 255)]
      private ?string $clearanceLevel = null;

      #[ORM\Column(type: 'float', options: ['default' => 0.0])]
      private float $goldBalance = 0.0;

      #[ORM\Column(type: 'json')]
      private array $purchaseHistory = [];

      #[ORM\Column(type: 'json', nullable: true)]
      private array $preferences = [];

      #[ORM\Column(type: 'json', nullable: true, options: ['default' => '[]'])]
      private array $loreReadHistory = [];

      #[ORM\Column(type: 'json', options: ['jsonb' => true])]
      private array $itemInteractions = [];
      
      #[ORM\Column(type: 'json', options: ['jsonb' => true])]
      private array $searchHistory = [];
      
      #[ORM\Column(type: 'json', options: ['jsonb' => true])]
      private array $browsingHistory = [];
      
            

      #[ORM\Column(type: 'json', nullable: true)]
      private array $categoryPreferences = [];

      

      public function getId(): ?int
      {
          return $this->id;
      }

      public function getEmail(): ?string
      {
          return $this->email;
      }

      public function setEmail(string $email): static
      {
          $this->email = $email;
          return $this;
      }

      public function getUserIdentifier(): string
      {
          return (string) $this->email;
      }

      public function getRoles(): array
      {
          $roles = $this->roles;
          $roles[] = 'ROLE_INITIATE';
          return array_unique($roles);
      }

      public function setRoles(array $roles): static
      {
          $this->roles = $roles;
          return $this;
      }

      public function getPassword(): string
      {
          return $this->password;
      }

      public function setPassword(string $password): static
      {
          $this->password = $password;
          return $this;
      }

      public function getUsername(): ?string
      {
          return $this->username;
      }

      public function setUsername(string $username): static
      {
          $this->username = $username;
          return $this;
      }

      public function getQuantumSignature(): ?string
      {
          return $this->quantumSignature;
      }

      public function setQuantumSignature(string $quantumSignature): static
      {
          $this->quantumSignature = $quantumSignature;
          return $this;
      }

      public function getInitiationDate(): ?\DateTimeImmutable
      {
          return $this->initiationDate;
      }

      public function setInitiationDate(\DateTimeImmutable $initiationDate): static
      {
          $this->initiationDate = $initiationDate;
          return $this;
      }

      public function getClearanceLevel(): ?string
      {
          return $this->clearanceLevel;
      }

      public function setClearanceLevel(string $clearanceLevel): static
      {
          $this->clearanceLevel = $clearanceLevel;
          return $this;
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

      public function getPreferences(): array
      {
          return $this->preferences;
      }

      public function setPreferences(array $preferences): self
      {
          $this->preferences = $preferences;
          return $this;
      }

      public function getLoreReadHistory(): array
      {
          return $this->loreReadHistory;
      }

      public function addToLoreReadHistory(array $lore): self
      {
          $this->loreReadHistory[] = $lore;
          return $this;
      }

      public function setLoreReadHistory(array $history): self
      {
          $this->loreReadHistory = $history;
          return $this;
      }

      public function eraseCredentials(): void
      {
          // Used for security purposes, intentionally empty
      }

      public function getBrowsingHistory(): array
      {
          return $this->browsingHistory;
      }

      public function addBrowsingEntry(array $entry): self
      {
          $this->browsingHistory[] = [
              'page' => $entry['page'],
              'timestamp' => new \DateTime(),
              'duration' => $entry['duration'] ?? null
          ];
          return $this;
      }

      public function getItemInteractions(): array
      {
          return $this->itemInteractions;
      }

      public function addItemInteraction(array $interaction): self
      {
          $this->itemInteractions[] = [
              'itemId' => $interaction['itemId'],
              'type' => $interaction['type'],
              'timestamp' => new \DateTime(),
              'duration' => $interaction['duration'] ?? null
          ];
          return $this;
      }
      

      
      public function getSearchHistory(): array
      {
          return $this->searchHistory;
      }

      public function addSearchQuery(string $query): self
      {
          $this->searchHistory[] = [
              'query' => $query,
              'timestamp' => new \DateTime()
          ];
          return $this;
      }

      public function getCategoryPreferences(): array
      {
          return $this->categoryPreferences;
      }

      public function updateCategoryPreference(string $category, int $weight): self
      {
          $this->categoryPreferences[$category] = ($this->categoryPreferences[$category] ?? 0) + $weight;
          return $this;
      }

      
  }
