<?php

namespace App\Entity;

use App\Entity\RecapElevage;
use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"email"},
 * message="L'email que vous avez indiqué est deja utilisée"
 * )
 */
class User implements UserInterface
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
    private $noms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenoms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroWhatsapp;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\EqualTo(propertyPath="confirmPassword", message = "Votre mot de passe doit etre le meme que celui dont vous confirmez")
     * @Assert\NotBlank
     */
    private $password;

    /** 
    * @Assert\EqualTo(propertyPath="password", message ="Votre mot de passe doit etre le meme que celui dont vous confirmez")
    * @Assert\NotBlank
    */
    public $confirmPassword;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\RecapElevage", mappedBy="idUser", orphanRemoval=true)
     */
    private $idUser;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    public function __construct()
    {
        $this->idUser = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|RecapElevage[]
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(RecapElevage $idUser): self
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser[] = $idUser;
            $idUser->setIdUser($this);
        }

        return $this;
    }

    public function removeIdUser(RecapElevage $idUser): self
    {
        if ($this->idUser->contains($idUser)) {
            $this->idUser->removeElement($idUser);
            // set the owning side to null (unless already changed)
            if ($idUser->getIdUser() === $this) {
                $idUser->setIdUser(null);
            }
        }

        return $this;
    }

    public function getNoms(): ?string
    {
        return $this->noms;
    }

    public function setNoms(string $noms): self
    {
        $this->noms = $noms;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(string $prenoms): self
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumeroWhatsapp(): ?int
    {
        return $this->numeroWhatsapp;
    }

    public function setNumeroWhatsapp(int $numeroWhatsapp): self
    {
        $this->numeroWhatsapp = $numeroWhatsapp;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setRoles(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    function addRole($role) {
        $this->roles[] = $role;
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->noms,
                $this->prenoms,
                $this->location,
                $this->email,
                $this->numero,
                $this->numeroWhatsapp,
                $this->numero,
                $this->idUser
                ) = unserialize($serialized);
    }

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->id,
                $this->noms,
                $this->prenoms,
                $this->location,
                $this->email,
                $this->numero,
                $this->numeroWhatsapp,
                $this->numero,
                $this->idUser
        ));
    }


    public function eraseCredentials(){}

        public function getSalt() {
          
            return null;
        }
        
            public function getRoles() {
                if (empty($this->roles)) {
                    return ['ROLE_USER'];
                }
                return $this->roles;
            }
        public function getUsername(){
            return $this->noms;
        }
}