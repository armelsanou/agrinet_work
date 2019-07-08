<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgriFinanceStructureRepository")
 */
class AgriFinanceStructure
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
    private $structure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AgriFinanceCategorie", inversedBy="agriFinanceStructures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCategorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(string $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getIdCategorie(): ?AgriFinanceCategorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?AgriFinanceCategorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }
}
