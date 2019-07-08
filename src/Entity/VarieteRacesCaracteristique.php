<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VarieteRacesCaracteristiqueRepository")
 */
class VarieteRacesCaracteristique
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
    private $variete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $caracteristiques;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BibliothequeRecherche", inversedBy="varieteRacesCaracteristiques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdBibliothequeRecherche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVariete(): ?string
    {
        return $this->variete;
    }

    public function setVariete(string $variete): self
    {
        $this->variete = $variete;

        return $this;
    }

    public function getCaracteristiques(): ?string
    {
        return $this->caracteristiques;
    }

    public function setCaracteristiques(string $caracteristiques): self
    {
        $this->caracteristiques = $caracteristiques;

        return $this;
    }

    public function getIdBibliothequeRecherche(): ?BibliothequeRecherche
    {
        return $this->IdBibliothequeRecherche;
    }

    public function setIdBibliothequeRecherche(?BibliothequeRecherche $IdBibliothequeRecherche): self
    {
        $this->IdBibliothequeRecherche = $IdBibliothequeRecherche;

        return $this;
    }
}
