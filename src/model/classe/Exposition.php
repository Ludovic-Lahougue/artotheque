<?php

namespace App\model;

use App\model\classe\oeuvre\Oeuvre;
use App\model\personne\Commissaire;

class Exposition
{
    private array $salles;
    private Commissaire $commissaire;
    private string $theme;

    public function __construct(Commissaire $commissaire, string $theme, array $salles = null)
    {
        $this->setCommissaire($commissaire);
        $this->setTheme($theme);
        $this->setSalles($salles == null ? array() : $salles);

    }

    /**
     * Get the value of salles
     */ 
    public function getSalles(): array
    {
        return $this->salles;
    }

    /**
     * Set the value of salles
     *
     * @return  self
     */ 
    public function setSalles(array $salles)
    {
        $this->salles = $salles;

        return $this;
    }

    public function addSalle(Salle $salle)
    {
        $this->salles[] = $salle;
    }

    public function removeSalle(Salle $salle)
    {
        $index = array_search($salle, $this->salles);
        if($index != false)
            unset($this->salles[$index]);
    }

    /**
     * Get the value of commissaire
     */ 
    public function getCommissaire(): Commissaire
    {
        return $this->commissaire;
    }

    /**
     * Set the value of commissaire
     *
     * @return  self
     */ 
    public function setCommissaire(Commissaire $commissaire)
    {
        $this->commissaire = $commissaire;

        return $this;
    }

    /**
     * Get the value of theme
     */ 
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * Set the value of theme
     *
     * @return  self
     */ 
    public function setTheme(string $theme)
    {
        $this->theme = $theme;

        return $this;
    }

    public function getOeuvres(): array {
        $oeuvres = array();
        foreach($this->salles as $salle)
            $oeuvres = array_merge($oeuvres, $salle->getOeuvres());
        return $oeuvres;
    }
}

?>