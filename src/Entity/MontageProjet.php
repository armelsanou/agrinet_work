<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MontageProjetRepository")
 */
class MontageProjet
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $situationFamiliale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreProjet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCulture_Animaux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $superficie_nombreAnimaux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capaciteTransformationOuDeSechage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateDebutActivite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomStructure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

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
    private $distanceParRapportAroute;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSituationFamiliale(): ?string
    {
        return $this->situationFamiliale;
    }

    public function setSituationFamiliale(string $situationFamiliale): self
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }

    public function getTitreProjet(): ?string
    {
        return $this->titreProjet;
    }

    public function setTitreProjet(string $titreProjet): self
    {
        $this->titreProjet = $titreProjet;

        return $this;
    }

    public function getNomCultureAnimaux(): ?string
    {
        return $this->nomCulture_Animaux;
    }

    public function setNomCultureAnimaux(string $nomCulture_Animaux): self
    {
        $this->nomCulture_Animaux = $nomCulture_Animaux;

        return $this;
    }

    public function getSuperficieNombreAnimaux(): ?string
    {
        return $this->superficie_nombreAnimaux;
    }

    public function setSuperficieNombreAnimaux(string $superficie_nombreAnimaux): self
    {
        $this->superficie_nombreAnimaux = $superficie_nombreAnimaux;

        return $this;
    }

    public function getCapaciteTransformationOuDeSechage(): ?string
    {
        return $this->capaciteTransformationOuDeSechage;
    }

    public function setCapaciteTransformationOuDeSechage(string $capaciteTransformationOuDeSechage): self
    {
        $this->capaciteTransformationOuDeSechage = $capaciteTransformationOuDeSechage;

        return $this;
    }

    public function getDateDebutActivite(): ?string
    {
        return $this->dateDebutActivite;
    }

    public function setDateDebutActivite(string $dateDebutActivite): self
    {
        $this->dateDebutActivite = $dateDebutActivite;

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

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

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

    public function getDistanceParRapportAroute(): ?string
    {
        return $this->distanceParRapportAroute;
    }

    public function setDistanceParRapportAroute(string $distanceParRapportAroute): self
    {
        $this->distanceParRapportAroute = $distanceParRapportAroute;

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
