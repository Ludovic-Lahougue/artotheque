<?php

namespace App\model\classe\oeuvre;

use App\model\personne\{Personne, Auteur};

class Film extends Oeuvre
{
    public function __construct(Auteur $auteur, string $description, string $code, Personne $proprietaire = null)
    {
        parent::__construct($auteur, $description, $code, $proprietaire);
    }
}