<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BibliothequeRechercheRepository")
 */
class BibliothequeRecherche
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cultureElevage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localiteRegion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VarieteRacesCaracteristique", mappedBy="IdBibliothequeRecherche")
     */
    private $varieteRacesCaracteristiques;

    public function __construct()
    {
        $this->varieteRacesCaracteristiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCultureElevage(): ?string
    {
        return $this->cultureElevage;
    }

    public function setCultureElevage(string $cultureElevage): self
    {
        $this->cultureElevage = $cultureElevage;

        return $this;
    }

    public function getLocaliteRegion(): ?string
    {
        return $this->localiteRegion;
    }

    public function setLocaliteRegion(string $localiteRegion): self
    {
        $this->localiteRegion = $localiteRegion;

        return $this;
    }

    /**
     * @return Collection|VarieteRacesCaracteristique[]
     */
    public function getVarieteRacesCaracteristiques(): Collection
    {
        return $this->varieteRacesCaracteristiques;
    }

    public function addVarieteRacesCaracteristique(VarieteRacesCaracteristique $varieteRacesCaracteristique): self
    {
        if (!$this->varieteRacesCaracteristiques->contains($varieteRacesCaracteristique)) {
            $this->varieteRacesCaracteristiques[] = $varieteRacesCaracteristique;
            $varieteRacesCaracteristique->setIdBibliothequeRecherche($this);
        }

        return $this;
    }

    public function removeVarieteRacesCaracteristique(VarieteRacesCaracteristique $varieteRacesCaracteristique): self
    {
        if ($this->varieteRacesCaracteristiques->contains($varieteRacesCaracteristique)) {
            $this->varieteRacesCaracteristiques->removeElement($varieteRacesCaracteristique);
            // set the owning side to null (unless already changed)
            if ($varieteRacesCaracteristique->getIdBibliothequeRecherche() === $this) {
                $varieteRacesCaracteristique->setIdBibliothequeRecherche(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->categorie;
    }
}
