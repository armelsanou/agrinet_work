<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DevenirExpertRepository")
 */
class DevenirExpert
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutProfessionel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fonctionActuelle;

  
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $langue1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $langue2;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secteurActivite1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secteurActivite2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secteurActivite3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $competence3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $autre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $souhaitMail;

    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mobilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauExperience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $langueVernaculaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationPro1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situationPro2;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getStatutProfessionel(): ?string
    {
        return $this->statutProfessionel;
    }

    public function setStatutProfessionel(string $statutProfessionel): self
    {
        $this->statutProfessionel = $statutProfessionel;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

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

    public function getFonctionActuelle(): ?string
    {
        return $this->fonctionActuelle;
    }

    public function setFonctionActuelle(string $fonctionActuelle): self
    {
        $this->fonctionActuelle = $fonctionActuelle;

        return $this;
    }

   
    public function getLangue1(): ?string
    {
        return $this->langue1;
    }

    public function setLangue1(string $langue1): self
    {
        $this->langue1 = $langue1;

        return $this;
    }

    public function getLangue2(): ?string
    {
        return $this->langue2;
    }

    public function setLangue2(?string $langue2): self
    {
        $this->langue2 = $langue2;

        return $this;
    }

 

    public function getSecteurActivite1(): ?string
    {
        return $this->secteurActivite1;
    }

    public function setSecteurActivite1(string $secteurActivite1): self
    {
        $this->secteurActivite1 = $secteurActivite1;

        return $this;
    }

    public function getSecteurActivite2(): ?string
    {
        return $this->secteurActivite2;
    }

    public function setSecteurActivite2(?string $secteurActivite2): self
    {
        $this->secteurActivite2 = $secteurActivite2;

        return $this;
    }

    public function getSecteurActivite3(): ?string
    {
        return $this->secteurActivite3;
    }

    public function setSecteurActivite3(?string $secteurActivite3): self
    {
        $this->secteurActivite3 = $secteurActivite3;

        return $this;
    }

    public function getCompetence1(): ?string
    {
        return $this->competence1;
    }

    public function setCompetence1(string $competence1): self
    {
        $this->competence1 = $competence1;

        return $this;
    }

    public function getCompetence2(): ?string
    {
        return $this->competence2;
    }

    public function setCompetence2(?string $competence2): self
    {
        $this->competence2 = $competence2;

        return $this;
    }

    public function getCompetence3(): ?string
    {
        return $this->competence3;
    }

    public function setCompetence3(?string $competence3): self
    {
        $this->competence3 = $competence3;

        return $this;
    }

    public function getAutre(): ?string
    {
        return $this->autre;
    }

    public function setAutre(?string $autre): self
    {
        $this->autre = $autre;

        return $this;
    }

    public function getCv()
    {
        return $this->cv;
    }

    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    public function getSouhaitMail(): ?string
    {
        return $this->souhaitMail;
    }

    public function setSouhaitMail(string $souhaitMail): self
    {
        $this->souhaitMail = $souhaitMail;

        return $this;
    }

    
    public function getMobilite(): ?string
    {
        return $this->mobilite;
    }

    public function setMobilite(string $mobilite): self
    {
        $this->mobilite = $mobilite;

        return $this;
    }

    public function getNiveauExperience(): ?string
    {
        return $this->niveauExperience;
    }

    public function setNiveauExperience(string $niveauExperience): self
    {
        $this->niveauExperience = $niveauExperience;

        return $this;
    }

    public function getLangueVernaculaire(): ?string
    {
        return $this->langueVernaculaire;
    }

    public function setLangueVernaculaire(string $langueVernaculaire): self
    {
        $this->langueVernaculaire = $langueVernaculaire;

        return $this;
    }

    public function getSituationPro1(): ?string
    {
        return $this->situationPro1;
    }

    public function setSituationPro1(?string $situationPro1): self
    {
        $this->situationPro1 = $situationPro1;

        return $this;
    }

    public function getSituationPro2(): ?string
    {
        return $this->situationPro2;
    }

    public function setSituationPro2(?string $situationPro2): self
    {
        $this->situationPro2 = $situationPro2;

        return $this;
    }
}
