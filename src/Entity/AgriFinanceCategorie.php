<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgriFinanceCategorieRepository")
 */
class AgriFinanceCategorie
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
     * @ORM\OneToMany(targetEntity="App\Entity\AgriFinanceStructure", mappedBy="idCategorie")
     */
    private $agriFinanceStructures;

    public function __construct()
    {
        $this->agriFinanceStructures = new ArrayCollection();
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

    /**
     * @return Collection|AgriFinanceStructure[]
     */
    public function getAgriFinanceStructures(): Collection
    {
        return $this->agriFinanceStructures;
    }

    public function addAgriFinanceStructure(AgriFinanceStructure $agriFinanceStructure): self
    {
        if (!$this->agriFinanceStructures->contains($agriFinanceStructure)) {
            $this->agriFinanceStructures[] = $agriFinanceStructure;
            $agriFinanceStructure->setIdCategorie($this);
        }

        return $this;
    }

    public function removeAgriFinanceStructure(AgriFinanceStructure $agriFinanceStructure): self
    {
        if ($this->agriFinanceStructures->contains($agriFinanceStructure)) {
            $this->agriFinanceStructures->removeElement($agriFinanceStructure);
            // set the owning side to null (unless already changed)
            if ($agriFinanceStructure->getIdCategorie() === $this) {
                $agriFinanceStructure->setIdCategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->categorie;
    }
}
