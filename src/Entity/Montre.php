<?php

namespace App\Entity;

use App\Repository\MontreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: MontreRepository::class)]
class Montre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $annee_fabrication = null;

    #[ORM\Column(length: 255)]
    private ?string $garantie = null;

    #[ORM\Column(length: 255)]
    private ?string $dimensions = null;

    #[ORM\ManyToMany(targetEntity: Commande::class, inversedBy: 'montres')]
    private Collection $commade;

    #[ORM\ManyToMany(targetEntity: Fournisseur::class, inversedBy: 'montres')]
    private Collection $Fournisseur;

    #[ORM\ManyToMany(targetEntity: Materiaux::class, inversedBy: 'montres')]
    private Collection $Materiaux;

    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'montres')]
    private Collection $Categories;

    #[ORM\OneToMany(mappedBy: 'montres', targetEntity: Avis::class)]
    private Collection $montreId;

    #[ORM\Column(length: 400)]
    private ?string $thumbnail = null;



    public function __construct()
    {
        $this->commade = new ArrayCollection();
        $this->Fournisseur = new ArrayCollection();
        $this->Materiaux = new ArrayCollection();
        $this->Categories = new ArrayCollection();
        $this->montreId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAnneeFabrication(): ?int
    {
        return $this->annee_fabrication;
    }

    public function setAnneeFabrication(int $annee_fabrication): static
    {
        $this->annee_fabrication = $annee_fabrication;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(string $garantie): static
    {
        $this->garantie = $garantie;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }





    /**
     * @return Collection<int, Commande>
     */
    public function getCommade(): Collection
    {
        return $this->commade;
    }

    public function addCommade(Commande $commade): static
    {
        if (!$this->commade->contains($commade)) {
            $this->commade->add($commade);
        }

        return $this;
    }

    public function removeCommade(Commande $commade): static
    {
        $this->commade->removeElement($commade);

        return $this;
    }

    /**
     * @return Collection<int, Fournisseur>
     */
    public function getFournisseur(): Collection
    {
        return $this->Fournisseur;
    }

    public function addFournisseur(Fournisseur $Fournisseur): static
    {
        if (!$this->Fournisseur->contains($Fournisseur)) {
            $this->Fournisseur->add($Fournisseur);
        }

        return $this;
    }

    public function removeFournisseur(Fournisseur $Fournisseur): static
    {
        $this->Fournisseur->removeElement($Fournisseur);

        return $this;
    }

    /**
     * @return Collection<int, Materiaux>
     */
    public function getMateriaux(): Collection
    {
        return $this->Materiaux;
    }

    public function addMateriaux(Materiaux $Materiaux): static
    {
        if (!$this->Materiaux->contains($Materiaux)) {
            $this->Materiaux->add($Materiaux);
        }

        return $this;
    }

    public function removeMateriaux(Materiaux $Materiaux): static
    {
        $this->Materiaux->removeElement($Materiaux);

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->Categories;
    }

    public function addCategory(Categories $category): static
    {
        if (!$this->Categories->contains($category)) {
            $this->Categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Categories $category): static
    {
        $this->Categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getMontreId(): Collection
    {
        return $this->montreId;
    }

    public function addMontreId(Avis $montreId): static
    {
        if (!$this->montreId->contains($montreId)) {
            $this->montreId->add($montreId);
            $montreId->setMontre($this);
        }

        return $this;
    }

    public function removeMontreId(Avis $montreId): static
    {
        if ($this->montreId->removeElement($montreId)) {
            // set the owning side to null (unless already changed)
            if ($montreId->getMontre() === $this) {
                $montreId->setMontre(null);
            }
        }

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
