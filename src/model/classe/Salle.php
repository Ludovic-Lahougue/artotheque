<?php

namespace App\model;

use App\enum\EtatOeuvre;
use App\model\classe\oeuvre\Oeuvre;
use Exception;

class Salle
{
    private array $oeuvres;

    public function __construct()
    {
        $this->oeuvres = array();
    }

    /**
     * Get the value of oeuvres
     */ 
    public function getOeuvres()
    {
        return $this->oeuvres;
    }

    public function addOeuvre(Oeuvre $oeuvre)
    {
        if($oeuvre->getEtat() == EtatOeuvre::STOCK || $oeuvre->getEtat() == EtatOeuvre::CATALOGUE) {
            $this->oeuvres[] = $oeuvre;
            $oeuvre->setEtat(EtatOeuvre::EXPOSEE);
        } else throw new Exception("Impossible d'exposer cette oeuvre");
    }

    public function removeOeuvre(Oeuvre $oeuvre)
    {
        $index = array_search($oeuvre, $this->oeuvres);
        if($index != false) {
            unset($this->oeuvres[$index]);
            $oeuvre->setEtat(EtatOeuvre::STOCK);
        }
    }
}

?>