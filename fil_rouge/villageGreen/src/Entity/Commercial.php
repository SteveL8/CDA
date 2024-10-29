<?php

namespace App\Entity;

use App\Repository\CommercialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommercialRepository::class)]
class Commercial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomCommercial = null;

    #[ORM\Column(length: 50)]
    private ?string $prenomCommercial = null;

    #[ORM\Column(length: 100)]
    private ?string $emailCommercial = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'commercial')]
    private Collection $User;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'Commercial')]
    private Collection $users;

    public function __construct()
    {
        $this->User = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial(string $nomCommercial): static
    {
        $this->nomCommercial = $nomCommercial;

        return $this;
    }

    public function getPrenomCommercial(): ?string
    {
        return $this->prenomCommercial;
    }

    public function setPrenomCommercial(string $prenomCommercial): static
    {
        $this->prenomCommercial = $prenomCommercial;

        return $this;
    }

    public function getEmailCommercial(): ?string
    {
        return $this->emailCommercial;
    }

    public function setEmailCommercial(string $emailCommercial): static
    {
        $this->emailCommercial = $emailCommercial;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): static
    {
        if (!$this->User->contains($user)) {
            $this->User->add($user);
            $user->setCommercial($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCommercial() === $this) {
                $user->setCommercial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }
}
