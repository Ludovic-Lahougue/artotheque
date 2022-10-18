<?php

namespace App\model;

class SalleProjecteur extends Salle
{
    public function __construct(array $oeuvres = null)
    {
        parent::__construct($oeuvres);
    }
}
?>