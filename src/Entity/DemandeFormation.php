<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeFormationRepository")
 */
class DemandeFormation
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telepone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauEtude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $experienceAgricole;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detailleExperience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productionVegetale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $productionAnimale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transformationEtSechage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autreSpecification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelepone(): ?string
    {
        return $this->telepone;
    }

    public function setTelepone(string $telepone): self
    {
        $this->telepone = $telepone;

        return $this;
    }

    public function getNiveauEtude(): ?string
    {
        return $this->niveauEtude;
    }

    public function setNiveauEtude(string $niveauEtude): self
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getExperienceAgricole(): ?string
    {
        return $this->experienceAgricole;
    }

    public function setExperienceAgricole(string $experienceAgricole): self
    {
        $this->experienceAgricole = $experienceAgricole;

        return $this;
    }

    public function getDetailleExperience(): ?string
    {
        return $this->detailleExperience;
    }

    public function setDetailleExperience(string $detailleExperience): self
    {
        $this->detailleExperience = $detailleExperience;

        return $this;
    }

    public function getProductionVegetale(): ?string
    {
        return $this->productionVegetale;
    }

    public function setProductionVegetale(string $productionVegetale): self
    {
        $this->productionVegetale = $productionVegetale;

        return $this;
    }

    public function getProductionAnimale(): ?string
    {
        return $this->productionAnimale;
    }

    public function setProductionAnimale(string $productionAnimale): self
    {
        $this->productionAnimale = $productionAnimale;

        return $this;
    }

    public function getTransformationEtSechage(): ?string
    {
        return $this->transformationEtSechage;
    }

    public function setTransformationEtSechage(string $transformationEtSechage): self
    {
        $this->transformationEtSechage = $transformationEtSechage;

        return $this;
    }

    public function getAutreSpecification(): ?string
    {
        return $this->autreSpecification;
    }

    public function setAutreSpecification(string $autreSpecification): self
    {
        $this->autreSpecification = $autreSpecification;

        return $this;
    }
}
