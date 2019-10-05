<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrganisationRepository")
 */
class Organisation
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
    private $imageOrganisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageOrganisation()
    {
        return $this->imageOrganisation;
    }

    public function setImageOrganisation($imageOrganisation): self
    {
        $this->imageOrganisation = $imageOrganisation;

        return $this;
    }
}
