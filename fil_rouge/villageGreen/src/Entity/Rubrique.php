<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RubriqueRepository::class)]
class Rubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomRubrique = null;

    /**
     * @var Collection<int, sousRubrique>
     */
    #[ORM\OneToMany(targetEntity: sousRubrique::class, mappedBy: 'rubrique')]
    private Collection $sousRubrique;

    /**
     * @var Collection<int, SousRubrique>
     */
    #[ORM\OneToMany(targetEntity: SousRubrique::class, mappedBy: 'Rubrique')]
    private Collection $sousRubriques;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function __construct()
    {
        $this->sousRubrique = new ArrayCollection();
        $this->sousRubriques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRubrique(): ?string
    {
        return $this->nomRubrique;
    }

    public function setNomRubrique(string $nomRubrique): static
    {
        $this->nomRubrique = $nomRubrique;

        return $this;
    }

    /**
     * @return Collection<int, sousRubrique>
     */
    public function getSousRubrique(): Collection
    {
        return $this->sousRubrique;
    }

    public function addSousRubrique(sousRubrique $sousRubrique): static
    {
        if (!$this->sousRubrique->contains($sousRubrique)) {
            $this->sousRubrique->add($sousRubrique);
            $sousRubrique->setRubrique($this);
        }

        return $this;
    }

    public function removeSousRubrique(sousRubrique $sousRubrique): static
    {
        if ($this->sousRubrique->removeElement($sousRubrique)) {
            // set the owning side to null (unless already changed)
            if ($sousRubrique->getRubrique() === $this) {
                $sousRubrique->setRubrique(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SousRubrique>
     */
    public function getSousRubriques(): Collection
    {
        return $this->sousRubriques;
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
}
