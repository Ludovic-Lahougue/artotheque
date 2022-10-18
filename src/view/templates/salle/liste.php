<h3>Liste des Salles :</h3>
<ul>
    <?php

use App\model\classe\SalleProjecteur;

 if(isset($content['salles'])) { ?>
        <?php foreach($content['salles'] as $salle) { ?>
            <li>
                <p>Salle <?php echo ($salle instanceof SalleProjecteur) ? "de projection" : null ?></p>
                <?php if (count($salle->getOeuvres())> 0) { ?>
                    <p>Oeuvres dans cette salle : </p>
                    <ul>
                        <?php foreach($salle->getOeuvres() as $oeuvre) {?>
                            <li>
                                <?php echo $oeuvre->getDescription() ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>Aucune oeuvre dans cette salle.</p>
                <?php } ?>
            </li>
        <?php } ?>
    <?php } ?>
</ul>