<?php

namespace App\model\classe\personne;

use App\model\enum\EtatOeuvre;
use App\model\classe\oeuvre\Oeuvre;
use App\model\interfaces\Caracteristique;
use Exception;

abstract class Personne
{
    private string $nom;
    private string $prenom;
    private string $email;
    private array $emprunts;

    public function __construct(string $nom, string $prenom, string $email)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setEmail($email);
        $this->emprunts = array();
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of emprunts
     */ 
    public function getEmprunts()
    {
        return $this->emprunts;
    }

    /**
     * Set the value of emprunts
     *
     * @return  self
     */ 
    public function setEmprunts($emprunts)
    {
        $this->emprunts = $emprunts;

        return $this;
    }

    public function addEmprunt(Oeuvre $oeuvre)
    {
        if($oeuvre->getEtat() == EtatOeuvre::CATALOGUE) {
            if($oeuvre instanceof Caracteristique) {
                if($oeuvre->getWeight() > 20)
                    throw new Exception("Impossible d'enprunter une oeuvre de plus de 20 kg");
            }
            $this->emprunts[] = $oeuvre;
            $oeuvre->setEtat(EtatOeuvre::EMPRUNTEE);
        } else throw new Exception("Emprunt impossible");
    }

    public function removeEmprunt(Oeuvre $oeuvre)
    {
        $index = array_search($oeuvre, $this->emprunts);
        if($index != false) {
            unset($this->emprunts[$index]);
            $oeuvre->setEtat(EtatOeuvre::CATALOGUE);
        }
    }
}

?>