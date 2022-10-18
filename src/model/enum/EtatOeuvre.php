<?php

namespace App\enum;

abstract class EtatOeuvre
{
    const STOCK = 0;
    const EXPOSEE = 1;
    const CATALOGUE = 2; 
    const EMPRUNTEE = 3;
}