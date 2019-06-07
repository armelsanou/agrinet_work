<?php

namespace App\Entity;

use App\Entity\RecapElevage;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string")
     * @Assert\Regex("/^[0-9]{9}$/")
     */
    private $numero;

    /**
     * @ORM\Column(type="string")
     * @Assert\Regex("/^[0-9]{9}$/")
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Command", mappedBy="relation")
     */
    private $commands;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Command", mappedBy="user")
     */
    private $relation;


    public function __construct()
    {
        $this->idUser = new ArrayCollection();
        $this->commands = new ArrayCollection();
        $this->relation = new ArrayCollection();
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

        /**
         * @return Collection|Command[]
         */
        public function getCommands(): Collection
        {
            return $this->commands;
        }

        public function addCommand(Command $command): self
        {
            if (!$this->commands->contains($command)) {
                $this->commands[] = $command;
                $command->setRelation($this);
            }

            return $this;
        }

        public function removeCommand(Command $command): self
        {
            if ($this->commands->contains($command)) {
                $this->commands->removeElement($command);
                // set the owning side to null (unless already changed)
                if ($command->getRelation() === $this) {
                    $command->setRelation(null);
                }
            }

            return $this;
        }

        /**
         * @return Collection|Command[]
         */
        public function getRelation(): Collection
        {
            return $this->relation;
        }

        public function addRelation(Command $relation): self
        {
            if (!$this->relation->contains($relation)) {
                $this->relation[] = $relation;
                $relation->setUser($this);
            }

            return $this;
        }

        public function removeRelation(Command $relation): self
        {
            if ($this->relation->contains($relation)) {
                $this->relation->removeElement($relation);
                // set the owning side to null (unless already changed)
                if ($relation->getUser() === $this) {
                    $relation->setUser(null);
                }
            }

            return $this;
        }


}