<?php

namespace App\Entity;

use App\Repository\SousRubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousRubriqueRepository::class)]
class SousRubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomSousRubrique = null;

    #[ORM\ManyToOne(inversedBy: 'sousRubrique')]
    private ?Rubrique $rubrique = null;

    #[ORM\ManyToOne(inversedBy: 'sousRubriques')]
    private ?Rubrique $Rubrique = null;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'sousRubrique')]
    private Collection $Produit;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'SousRubrique')]
    private Collection $produits;

    public function __construct()
    {
        $this->Produit = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSousRubrique(): ?string
    {
        return $this->nomSousRubrique;
    }

    public function setNomSousRubrique(string $nomSousRubrique): static
    {
        $this->nomSousRubrique = $nomSousRubrique;

        return $this;
    }

    public function getRubrique(): ?Rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?Rubrique $rubrique): static
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduit(): Collection
    {
        return $this->Produit;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->Produit->contains($produit)) {
            $this->Produit->add($produit);
            $produit->setSousRubrique($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->Produit->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getSousRubrique() === $this) {
                $produit->setSousRubrique(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }
}
