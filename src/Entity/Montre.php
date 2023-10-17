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

    #[ORM\ManyToMany(targetEntity: commande::class, inversedBy: 'montres')]
    private Collection $commade;

    #[ORM\ManyToMany(targetEntity: fournisseur::class, inversedBy: 'montres')]
    private Collection $fournisseur;

    #[ORM\ManyToMany(targetEntity: materiaux::class, inversedBy: 'montres')]
    private Collection $materieaux;

    #[ORM\ManyToMany(targetEntity: categories::class, inversedBy: 'montres')]
    private Collection $categories;

    #[ORM\OneToMany(mappedBy: 'montre', targetEntity: avis::class)]
    private Collection $montreId;

    #[ORM\Column(length: 400)]
    private ?string $thumbnail = null;

    public function __construct()
    {
        $this->commade = new ArrayCollection();
        $this->fournisseur = new ArrayCollection();
        $this->materieaux = new ArrayCollection();
        $this->categories = new ArrayCollection();
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

    public function setDimensions(string $dimensions): static
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * @return Collection<int, commande>
     */
    public function getCommade(): Collection
    {
        return $this->commade;
    }

    public function addCommade(commande $commade): static
    {
        if (!$this->commade->contains($commade)) {
            $this->commade->add($commade);
        }

        return $this;
    }

    public function removeCommade(commande $commade): static
    {
        $this->commade->removeElement($commade);

        return $this;
    }

    /**
     * @return Collection<int, fournisseur>
     */
    public function getFournisseur(): Collection
    {
        return $this->fournisseur;
    }

    public function addFournisseur(fournisseur $fournisseur): static
    {
        if (!$this->fournisseur->contains($fournisseur)) {
            $this->fournisseur->add($fournisseur);
        }

        return $this;
    }

    public function removeFournisseur(fournisseur $fournisseur): static
    {
        $this->fournisseur->removeElement($fournisseur);

        return $this;
    }

    /**
     * @return Collection<int, materiaux>
     */
    public function getMaterieaux(): Collection
    {
        return $this->materieaux;
    }

    public function addMaterieaux(materiaux $materieaux): static
    {
        if (!$this->materieaux->contains($materieaux)) {
            $this->materieaux->add($materieaux);
        }

        return $this;
    }

    public function removeMaterieaux(materiaux $materieaux): static
    {
        $this->materieaux->removeElement($materieaux);

        return $this;
    }

    /**
     * @return Collection<int, categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(categories $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(categories $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, avis>
     */
    public function getMontreId(): Collection
    {
        return $this->montreId;
    }

    public function addMontreId(avis $montreId): static
    {
        if (!$this->montreId->contains($montreId)) {
            $this->montreId->add($montreId);
            $montreId->setMontre($this);
        }

        return $this;
    }

    public function removeMontreId(avis $montreId): static
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
