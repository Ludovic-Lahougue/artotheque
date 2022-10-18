<?php

namespace App\model\classe\oeuvre;

use App\model\classe\personne\Auteur;

class Peinture extends Oeuvre
{
    public function __construct(Auteur $auteur, string $description, string $code)
    {
        parent::__construct($auteur, $description, $code);
    }
}