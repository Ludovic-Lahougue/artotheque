<?php

namespace App\model\classe;

use App\model\classe\oeuvre\Oeuvre;
use App\model\enum\EtatOeuvre;
use Exception;

class SalleProjecteur extends Salle
{
    public function __construct(string $id)
    {
        parent::__construct($id);
    }

    public function newOeuvre(Oeuvre $oeuvre)
    {
        parent::addOeuvre($oeuvre);
    }
}
?>