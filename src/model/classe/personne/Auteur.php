<?php

namespace App\model\personne;

use App\model\classe\oeuvre\Oeuvre;

class Auteur extends Personne
{
    private string $telephone;
    private array $oeuvres;
    public function __construct(string $nom, string $prenom, string $email, string $telephone, array $oeuvres = null)
    {
        parent::__construct($nom, $prenom, $email);
        $this->setTelephone($telephone);
        $this->setOeuvres($oeuvres == null ? array() : $oeuvres);
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of oeuvres
     */ 
    public function getOeuvres(): array
    {
        return $this->oeuvres;
    }

    /**
     * Set the value of oeuvres
     *
     * @return  self
     */ 
    public function setOeuvres(array $oeuvres)
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }

    public function addOeuvre(Oeuvre $oeuvre)
    {
        $this->oeuvres[] = $oeuvre;
    }
}

?>