<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RenforcementCapaciteRepository")
 */
class RenforcementCapacite
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
    private $NomStructure;

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
    private $distanceParRapoortARoute;

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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $besoinEnRenforcement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreDePlace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PlusDeDetails;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStructure(): ?string
    {
        return $this->NomStructure;
    }

    public function setNomStructure(string $NomStructure): self
    {
        $this->NomStructure = $NomStructure;

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

    public function getDistanceParRapoortARoute(): ?string
    {
        return $this->distanceParRapoortARoute;
    }

    public function setDistanceParRapoortARoute(string $distanceParRapoortARoute): self
    {
        $this->distanceParRapoortARoute = $distanceParRapoortARoute;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getBesoinEnRenforcement(): ?string
    {
        return $this->besoinEnRenforcement;
    }

    public function setBesoinEnRenforcement(string $besoinEnRenforcement): self
    {
        $this->besoinEnRenforcement = $besoinEnRenforcement;

        return $this;
    }

    public function getNombreDePlace(): ?string
    {
        return $this->nombreDePlace;
    }

    public function setNombreDePlace(string $nombreDePlace): self
    {
        $this->nombreDePlace = $nombreDePlace;

        return $this;
    }

    public function getPlusDeDetails(): ?string
    {
        return $this->PlusDeDetails;
    }

    public function setPlusDeDetails(string $PlusDeDetails): self
    {
        $this->PlusDeDetails = $PlusDeDetails;

        return $this;
    }
}
