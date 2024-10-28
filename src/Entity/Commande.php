<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column]
    private ?bool $statutCommande = null;

    #[ORM\Column]
    private ?int $totalHt = null;

    #[ORM\Column(nullable: true)]
    private ?int $remise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): static
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function isStatutCommande(): ?bool
    {
        return $this->statutCommande;
    }

    public function setStatutCommande(bool $statutCommande): static
    {
        $this->statutCommande = $statutCommande;

        return $this;
    }

    public function getTotalHt(): ?int
    {
        return $this->totalHt;
    }

    public function setTotalHt(int $totalHt): static
    {
        $this->totalHt = $totalHt;

        return $this;
    }

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(?int $remise): static
    {
        $this->remise = $remise;

        return $this;
    }
}
