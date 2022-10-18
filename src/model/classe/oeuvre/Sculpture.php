<?php

namespace App\model\classe\oeuvre;

use App\model\interfaces\Caracteristique;
use App\model\personne\{Personne, Auteur};

class Sculpture extends Oeuvre implements Caracteristique
{
    private float $weight;

    public function __construct(Auteur $auteur, string $description, string $code, float $weight, Personne $proprietaire = null)
    {
        parent::__construct($auteur, $description, $code, $proprietaire);
        $this->setWeight($weight);
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }
}