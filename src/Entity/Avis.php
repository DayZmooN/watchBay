<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $note = null;

    #[ORM\Column(length: 255)]
    private ?string $commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'montreId')]
    private ?Montre $montre = null;

    #[ORM\ManyToOne(inversedBy: 'Avis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $AvisId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getMontre(): ?Montre
    {
        return $this->montre;
    }

    public function setMontre(?Montre $montre): static
    {
        $this->montre = $montre;

        return $this;
    }

    public function getAvisId(): ?Users
    {
        return $this->AvisId;
    }

    public function setAvisId(?Users $AvisId): static
    {
        $this->AvisId = $AvisId;

        return $this;
    }
}
