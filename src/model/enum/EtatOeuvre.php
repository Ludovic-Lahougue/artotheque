<?php

namespace App\model\enum;

abstract class EtatOeuvre
{
    const STOCK = "En stock";
    const EXPOSEE = "Exposée";
    const CATALOGUE = "Au catalogue"; 
    const EMPRUNTEE = "Empruntée";
}