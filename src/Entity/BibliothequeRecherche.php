<?php

namespace App\Entity;

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
}
