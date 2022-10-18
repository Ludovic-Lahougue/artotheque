<?php

namespace App\model\personne;

class Usager extends Personne
{
    public function __construct(string $nom, string $prenom, string $email)
    {
        parent::__construct($nom, $prenom, $email);
    }
}

?>