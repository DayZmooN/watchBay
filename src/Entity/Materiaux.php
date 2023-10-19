<?php

namespace App\Entity;

use App\Repository\MateriauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MateriauxRepository::class)]
class Materiaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private ?string $type = null;

    #[ORM\ManyToMany(targetEntity: Montre::class, mappedBy: 'Materiaux')]
    private Collection $montres;

    public function __construct()
    {
        $this->montres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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
            $montre->addMateriaux($this);
        }

        return $this;
    }

    public function removeMontre(Montre $montre): static
    {
        if ($this->montres->removeElement($montre)) {
            $montre->removeMateriaux($this);
        }

        return $this;
    }
}
