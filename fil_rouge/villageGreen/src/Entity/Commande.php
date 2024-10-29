<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $totalHT = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 0)]
    private ?string $remise = null;

    #[ORM\ManyToOne(inversedBy: 'Commande')]
    private ?Adresse $adresse = null;

    #[ORM\ManyToOne(inversedBy: 'Commande')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?User $User = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Adresse $Adresse = null;

    /**
     * @var Collection<int, Livraison>
     */
    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'commande')]
    private Collection $Livraison;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Facture $Facture = null;

    /**
     * @var Collection<int, Livraison>
     */
    #[ORM\OneToMany(targetEntity: Livraison::class, mappedBy: 'Commande')]
    private Collection $livraisons;

    /**
     * @var Collection<int, Contient>
     */
    #[ORM\OneToMany(targetEntity: Contient::class, mappedBy: 'Commande')]
    private Collection $contients;

    public function __construct()
    {
        $this->Livraison = new ArrayCollection();
        $this->livraisons = new ArrayCollection();
        $this->contients = new ArrayCollection();
    }

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

    public function getTotalHT(): ?string
    {
        return $this->totalHT;
    }

    public function setTotalHT(string $totalHT): static
    {
        $this->totalHT = $totalHT;

        return $this;
    }

    public function getRemise(): ?string
    {
        return $this->remise;
    }

    public function setRemise(string $remise): static
    {
        $this->remise = $remise;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

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
            $livraison->setCommande($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->Livraison->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getCommande() === $this) {
                $livraison->setCommande(null);
            }
        }

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->Facture;
    }

    public function setFacture(?Facture $Facture): static
    {
        $this->Facture = $Facture;

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
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
            $contient->setCommande($this);
        }

        return $this;
    }

    public function removeContient(Contient $contient): static
    {
        if ($this->contients->removeElement($contient)) {
            // set the owning side to null (unless already changed)
            if ($contient->getCommande() === $this) {
                $contient->setCommande(null);
            }
        }

        return $this;
    }
}
