<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\Length(min ="8", minMessage ="votre mot de passe doit etre au moins huit caractères")
     * @Assert\EqualTo(propertyPath="confirmPassword", message = "Votre mot de passe doit etre le meme que celui dont vous confirmez")
     * @Assert\NotBlank
     */
    private $password;

    /** 
    * @Assert\EqualTo(propertyPath="password", message ="Votre mot de passe doit etre le meme que celui dont vous confirmez")
    * @Assert\NotBlank
    */

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salt;

    public $confirmPassword;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRoles(): ?string
    {
        return $this->role;
    }

    public function setRoles(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->noms;
    }

    public function setUsername(string $noms): self
    {
        $this->noms = $noms;

        return $this;
    }

    public function eraseCredentials(){}

}
