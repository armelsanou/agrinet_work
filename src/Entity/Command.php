<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
 */
class Command
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
    private $nomCommercial;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pointDeLivraison;

   /**
     * @ORM\Column(type="string")
     * @Assert\Regex("/^[0-9]{9}$/")
     * message="Votre numéro de téléphone doit ressembler à celui ci 695390226"
     */
    private $telephone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commands")
     */
    private $relation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="relation")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $varieteRace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial(string $nomCommercial): self
    {
        $this->nomCommercial = $nomCommercial;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPointDeLivraison(): ?string
    {
        return $this->pointDeLivraison;
    }

    public function setPointDeLivraison(string $pointDeLivraison): self
    {
        $this->pointDeLivraison = $pointDeLivraison;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getRelation(): ?User
    {
        return $this->relation;
    }

    public function setRelation(?User $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getVarieteRace(): ?string
    {
        return $this->varieteRace;
    }

    public function setVarieteRace(string $varieteRace): self
    {
        $this->varieteRace = $varieteRace;

        return $this;
    }



}
