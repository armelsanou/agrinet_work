<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecapElevageRepository")
 */
class RecapElevage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomTraitement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantiteTraitement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uniteTraitement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixTraitement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomAlimentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantiteAlimentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixAlimentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomComplement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantiteComplement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixComplement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreFamilial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prixValeurFamilial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreEmploye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coutEmploye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreTacheron;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coutTacheron;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexeAnimal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="idUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNomTraitement(): ?string
    {
        return $this->nomTraitement;
    }

    public function setNomTraitement(string $nomTraitement): self
    {
        $this->nomTraitement = $nomTraitement;

        return $this;
    }

    public function getQuantiteTraitement(): ?string
    {
        return $this->quantiteTraitement;
    }

    public function setQuantiteTraitement(string $quantiteTraitement): self
    {
        $this->quantiteTraitement = $quantiteTraitement;

        return $this;
    }

    public function getUniteTraitement(): ?string
    {
        return $this->uniteTraitement;
    }

    public function setUniteTraitement(string $uniteTraitement): self
    {
        $this->uniteTraitement = $uniteTraitement;

        return $this;
    }

    public function getPrixTraitement(): ?string
    {
        return $this->prixTraitement;
    }

    public function setPrixTraitement(string $prixTraitement): self
    {
        $this->prixTraitement = $prixTraitement;

        return $this;
    }

    public function getNomAlimentation(): ?string
    {
        return $this->nomAlimentation;
    }

    public function setNomAlimentation(string $nomAlimentation): self
    {
        $this->nomAlimentation = $nomAlimentation;

        return $this;
    }

    public function getQuantiteAlimentation(): ?string
    {
        return $this->quantiteAlimentation;
    }

    public function setQuantiteAlimentation(string $quantiteAlimentation): self
    {
        $this->quantiteAlimentation = $quantiteAlimentation;

        return $this;
    }

    public function getPrixAlimentation(): ?string
    {
        return $this->prixAlimentation;
    }

    public function setPrixAlimentation(string $prixAlimentation): self
    {
        $this->prixAlimentation = $prixAlimentation;

        return $this;
    }

    public function getNomComplement(): ?string
    {
        return $this->nomComplement;
    }

    public function setNomComplement(string $nomComplement): self
    {
        $this->nomComplement = $nomComplement;

        return $this;
    }

    public function getQuantiteComplement(): ?string
    {
        return $this->quantiteComplement;
    }

    public function setQuantiteComplement(string $quantiteComplement): self
    {
        $this->quantiteComplement = $quantiteComplement;

        return $this;
    }

    public function getPrixComplement(): ?string
    {
        return $this->prixComplement;
    }

    public function setPrixComplement(string $prixComplement): self
    {
        $this->prixComplement = $prixComplement;

        return $this;
    }

    public function getNombreFamilial(): ?string
    {
        return $this->nombreFamilial;
    }

    public function setNombreFamilial(string $nombreFamilial): self
    {
        $this->nombreFamilial = $nombreFamilial;

        return $this;
    }

    public function getPrixValeurFamilial(): ?string
    {
        return $this->prixValeurFamilial;
    }

    public function setPrixValeurFamilial(string $prixValeurFamilial): self
    {
        $this->prixValeurFamilial = $prixValeurFamilial;

        return $this;
    }

    public function getNombreEmploye(): ?string
    {
        return $this->nombreEmploye;
    }

    public function setNombreEmploye(string $nombreEmploye): self
    {
        $this->nombreEmploye = $nombreEmploye;

        return $this;
    }

    public function getCoutEmploye(): ?string
    {
        return $this->coutEmploye;
    }

    public function setCoutEmploye(string $coutEmploye): self
    {
        $this->coutEmploye = $coutEmploye;

        return $this;
    }

    public function getNombreTacheron(): ?string
    {
        return $this->nombreTacheron;
    }

    public function setNombreTacheron(string $nombreTacheron): self
    {
        $this->nombreTacheron = $nombreTacheron;

        return $this;
    }

    public function getCoutTacheron(): ?string
    {
        return $this->coutTacheron;
    }

    public function setCoutTacheron(string $coutTacheron): self
    {
        $this->coutTacheron = $coutTacheron;

        return $this;
    }

    public function getTransport(): ?string
    {
        return $this->transport;
    }

    public function setTransport(string $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getAutre(): ?string
    {
        return $this->autre;
    }

    public function setAutre(string $autre): self
    {
        $this->autre = $autre;

        return $this;
    }

    public function getSexeAnimal(): ?string
    {
        return $this->sexeAnimal;
    }

    public function setSexeAnimal(string $sexeAnimal): self
    {
        $this->sexeAnimal = $sexeAnimal;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
