<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateFacture = null;

    #[ORM\Column]
    private ?int $montantHt = null;

    #[ORM\Column]
    private ?int $montantTtc = null;

    #[ORM\Column(length: 255)]
    private ?string $typePaiment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(\DateTimeInterface $dateFacture): static
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    public function getMontantHt(): ?int
    {
        return $this->montantHt;
    }

    public function setMontantHt(int $montantHt): static
    {
        $this->montantHt = $montantHt;

        return $this;
    }

    public function getMontantTtc(): ?int
    {
        return $this->montantTtc;
    }

    public function setMontantTtc(int $montantTtc): static
    {
        $this->montantTtc = $montantTtc;

        return $this;
    }

    public function getTypePaiment(): ?string
    {
        return $this->typePaiment;
    }

    public function setTypePaiment(string $typePaiment): static
    {
        $this->typePaiment = $typePaiment;

        return $this;
    }
}
