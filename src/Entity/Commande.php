<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $create_at = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(length: 400)]
    private ?string $address_livraison = null;

    #[ORM\Column]
    private ?float $frais_livraison = null;

    #[ORM\ManyToMany(targetEntity: Montre::class, mappedBy: 'Commande')]
    private Collection $montres;

    #[ORM\ManyToOne(inversedBy: 'Commande')]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $userid = null;

    public function __construct()
    {
        $this->montres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeImmutable $create_at): static
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getAddressLivraison(): ?string
    {
        return $this->address_livraison;
    }

    public function setAddressLivraison(string $address_livraison): static
    {
        $this->address_livraison = $address_livraison;

        return $this;
    }

    public function getFraisLivraison(): ?float
    {
        return $this->frais_livraison;
    }

    public function setFraisLivraison(float $frais_livraison): static
    {
        $this->frais_livraison = $frais_livraison;

        return $this;
    }

    /**
     * @return Collection<int, Montre>
     */
    public function getMontres(): Collection
    {
        return $this->montres;
    }

    public function addMontre(Montre $montre): static
    {
        if (!$this->montres->contains($montre)) {
            $this->montres->add($montre);
            $montre->addCommade($this);
        }

        return $this;
    }

    public function removeMontre(Montre $montre): static
    {
        if ($this->montres->removeElement($montre)) {
            $montre->removeCommade($this);
        }

        return $this;
    }

    public function getUserid(): ?users
    {
        return $this->userid;
    }

    public function setUserid(?users $userid): static
    {
        $this->userid = $userid;

        return $this;
    }
}
