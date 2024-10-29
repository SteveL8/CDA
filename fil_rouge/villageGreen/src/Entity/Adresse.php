<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $adresseLivraison = null;

    #[ORM\Column(length: 100)]
    private ?string $adresseFacturation = null;

    #[ORM\Column]
    private ?int $codePostal = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    /**
     * @var Collection<int, Commande>
     */
    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'adresse')]
    private Collection $Commande;

    /**
     * @var Collection<int, Livraison>
     */
    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'adresse')]
    private Collection $Livraison;

    /**
     * @var Collection<int, Commande>
     */
    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'Adresse')]
    private Collection $commandes;

    /**
     * @var Collection<int, Livraison>
     */
    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'Adresse')]
    private Collection $livraisons;

    public function __construct()
    {
        $this->Commande = new ArrayCollection();
        $this->Livraison = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->livraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresseLivraison;
    }

    public function setAdresseLivraison(string $adresseLivraison): static
    {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation(string $adresseFacturation): static
    {
        $this->adresseFacturation = $adresseFacturation;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->Commande;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->Commande->contains($commande)) {
            $this->Commande->add($commande);
            $commande->setAdresse($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->Commande->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getAdresse() === $this) {
                $commande->setAdresse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraison(): Collection
    {
        return $this->Livraison;
    }

    public function addLivraison(Livraison $livraison): static
    {
        if (!$this->Livraison->contains($livraison)) {
            $this->Livraison->add($livraison);
            $livraison->setAdresse($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->Livraison->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getAdresse() === $this) {
                $livraison->setAdresse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }
}
