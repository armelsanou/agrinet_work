<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GestionDuSolRepository")
 */
class GestionDuSol
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
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauEtude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siuationFamiliale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomStructure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arrondissement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $distanceParRapportARoute;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anneeExperience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serviceSollicite;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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

    public function getSiuationFamiliale(): ?string
    {
        return $this->siuationFamiliale;
    }

    public function setSiuationFamiliale(string $siuationFamiliale): self
    {
        $this->siuationFamiliale = $siuationFamiliale;

        return $this;
    }

    public function getNomStructure(): ?string
    {
        return $this->nomStructure;
    }

    public function setNomStructure(string $nomStructure): self
    {
        $this->nomStructure = $nomStructure;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(string $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getArrondissement(): ?string
    {
        return $this->arrondissement;
    }

    public function setArrondissement(string $arrondissement): self
    {
        $this->arrondissement = $arrondissement;

        return $this;
    }

    public function getDistanceParRapportARoute(): ?string
    {
        return $this->distanceParRapportARoute;
    }

    public function setDistanceParRapportARoute(string $distanceParRapportARoute): self
    {
        $this->distanceParRapportARoute = $distanceParRapportARoute;

        return $this;
    }

    public function getAnneeExperience(): ?string
    {
        return $this->anneeExperience;
    }

    public function setAnneeExperience(string $anneeExperience): self
    {
        $this->anneeExperience = $anneeExperience;

        return $this;
    }

    public function getServiceSollicite(): ?string
    {
        return $this->serviceSollicite;
    }

    public function setServiceSollicite(string $serviceSollicite): self
    {
        $this->serviceSollicite = $serviceSollicite;

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
