<?php

  namespace App\Entity\Trait;

  use Doctrine\ORM\Mapping as ORM;

  trait ShadowMetadataTrait
  {
      #[ORM\Column(length: 255, nullable: true)]
      private ?string $celestialCoordinates = null;

      #[ORM\Column(length: 100, nullable: true)]
      private ?string $quantumSignature = null;

      #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
      private ?float $temporalFrequency = null;

      #[ORM\Column(nullable: true)]
      private ?int $entropyLevel = null;

      #[ORM\Column(length: 50, nullable: true)]
      private ?string $dimensionalKey = null;

      #[ORM\Column(type: 'datetime', nullable: true)]
      private ?\DateTimeInterface $discoveryDate = null;

      #[ORM\Column(length: 20, nullable: true)]
      private ?string $classificationCode = null;

      #[ORM\Column(type: 'text', nullable: true)]
      private ?string $containmentProtocol = null;

      #[ORM\Column(length: 255, nullable: true)]
      private ?string $realityAnchorPoint = null;

      public function getCelestialCoordinates(): ?string
      {
          return $this->celestialCoordinates;
      }

      public function setCelestialCoordinates(?string $celestialCoordinates): self
      {
          $this->celestialCoordinates = $celestialCoordinates;
          return $this;
      }

      public function getQuantumSignature(): ?string
      {
          return $this->quantumSignature;
      }

      public function setQuantumSignature(?string $quantumSignature): self
      {
          $this->quantumSignature = $quantumSignature;
          return $this;
      }

      public function getTemporalFrequency(): ?float
      {
          return $this->temporalFrequency;
      }

      public function setTemporalFrequency(?float $temporalFrequency): self
      {
          $this->temporalFrequency = $temporalFrequency;
          return $this;
      }

      public function getEntropyLevel(): ?int
      {
          return $this->entropyLevel;
      }

      public function setEntropyLevel(?int $entropyLevel): self
      {
          $this->entropyLevel = $entropyLevel;
          return $this;
      }

      public function getDimensionalKey(): ?string
      {
          return $this->dimensionalKey;
      }

      public function setDimensionalKey(?string $dimensionalKey): self
      {
          $this->dimensionalKey = $dimensionalKey;
          return $this;
      }

      public function getDiscoveryDate(): ?\DateTimeInterface
      {
          return $this->discoveryDate;
      }

      public function setDiscoveryDate(?\DateTimeInterface $discoveryDate): self
      {
          $this->discoveryDate = $discoveryDate;
          return $this;
      }

      public function getClassificationCode(): ?string
      {
          return $this->classificationCode;
      }

      public function setClassificationCode(?string $classificationCode): self
      {
          $this->classificationCode = $classificationCode;
          return $this;
      }

      public function getContainmentProtocol(): ?string
      {
          return $this->containmentProtocol;
      }

      public function setContainmentProtocol(?string $containmentProtocol): self
      {
          $this->containmentProtocol = $containmentProtocol;
          return $this;
      }

      public function getRealityAnchorPoint(): ?string
      {
          return $this->realityAnchorPoint;
      }

      public function setRealityAnchorPoint(?string $realityAnchorPoint): self
      {
          $this->realityAnchorPoint = $realityAnchorPoint;
          return $this;
      }
  }
