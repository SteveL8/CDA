<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $prixAchat = null;

    #[ORM\Column(length: 250)]
    private ?string $image = null;

    #[ORM\Column(length: 400)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(length: 20)]
    private ?string $libelleCourt = null;

    #[ORM\Column(length: 200)]
    private ?string $libelleLong = null;

    #[ORM\Column(length: 400)]
    private ?string $refFournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'Produit')]
    private ?SousRubrique $sousRubrique = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?SousRubrique $SousRubrique = null;

    /**
     * @var Collection<int, Contient>
     */
    #[ORM\OneToMany(targetEntity: Contient::class, mappedBy: 'Produit')]
    private Collection $contients;

    public function __construct()
    {
        $this->contients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixAchat(): ?int
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(int $prixAchat): static
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getLibelleCourt(): ?string
    {
        return $this->libelleCourt;
    }

    public function setLibelleCourt(string $libelleCourt): static
    {
        $this->libelleCourt = $libelleCourt;

        return $this;
    }

    public function getLibelleLong(): ?string
    {
        return $this->libelleLong;
    }

    public function setLibelleLong(string $libelleLong): static
    {
        $this->libelleLong = $libelleLong;

        return $this;
    }

    public function getRefFournisseur(): ?string
    {
        return $this->refFournisseur;
    }

    public function setRefFournisseur(string $refFournisseur): static
    {
        $this->refFournisseur = $refFournisseur;

        return $this;
    }

    public function getSousRubrique(): ?SousRubrique
    {
        return $this->sousRubrique;
    }

    public function setSousRubrique(?SousRubrique $sousRubrique): static
    {
        $this->sousRubrique = $sousRubrique;

        return $this;
    }

    /**
     * @return Collection<int, Contient>
     */
    public function getContients(): Collection
    {
        return $this->contients;
    }

    public function addContient(Contient $contient): static
    {
        if (!$this->contients->contains($contient)) {
            $this->contients->add($contient);
            $contient->setProduit($this);
        }

        return $this;
    }

    public function removeContient(Contient $contient): static
    {
        if ($this->contients->removeElement($contient)) {
            // set the owning side to null (unless already changed)
            if ($contient->getProduit() === $this) {
                $contient->setProduit(null);
            }
        }
        

        return $this;
    }
}
