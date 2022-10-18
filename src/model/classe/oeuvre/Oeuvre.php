<?php

namespace App\model\classe\oeuvre;

use App\enum\EtatOeuvre;
use App\model\personne\Auteur;
use App\model\personne\Personne;

abstract class Oeuvre
{
    private Auteur $auteur;
    private Personne $proprietaire;
    private string $description;
    private string $code;
    private int $etat;

    public function __construct(Auteur $auteur, string $description, string $code, Personne $proprietaire = null)
    {
        $this->setAuteur($auteur);
        $this->setDescription($description);
        $this->setCode($code);
        $this->setProprietaire($proprietaire);
        $this->setEtat(EtatOeuvre::STOCK);
        $auteur->addOeuvre($this);
    }

    /**
     * Get the value of auteur
     */ 
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur(Auteur $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of Proprietaire
     */ 
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set the value of Proprietaire
     *
     * @return  self
     */ 
    public function setProprietaire(Personne $proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode(string $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat(): int
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat(int $etat)
    {
        $this->etat = $etat;

        return $this;
    }
}