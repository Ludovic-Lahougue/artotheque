<?php

namespace App\model\classe\personne;

class Commissaire extends Personne
{
    public function __construct(string $nom, string $prenom, string $email)
    {
        parent::__construct($nom, $prenom, $email);
    }
}

?>