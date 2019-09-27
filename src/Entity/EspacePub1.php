<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EspacePub1Repository")
 */
class EspacePub1
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
    private $photo1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto1()
    {
        return $this->photo1;
    }

    public function setPhoto1($photo1): self
    {
        $this->photo1 = $photo1;

        return $this;
    }
}
