<a href="/?controller=salle&action=new">Nouvelle Salle</a>
<h3>Liste des Salles :</h3>
<ul>
    <?php

use App\model\classe\SalleProjecteur;

 if(isset($content['salles'])) { ?>
        <?php foreach($content['salles'] as $salle) { ?>
            <li>
                <p><?php echo $salle->getId() ?? "Non défini" ?></p>
                <p><?php echo ($salle instanceof SalleProjecteur) ? "Salle de projection" : null ?></p>
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
                <form method="POST" action="/?controller=salle&action=delete" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette salle ?')">
                    <input type="hidden" name="id" value="<?php echo $salle->getId() ?>" />
                    <button type="submit">Supprimer</button>
                </form>
                <form method="POST" action="/?controller=salle&action=modify">
                    <input type="hidden" name="id" value="<?php echo $salle->getId() ?>" />
                    <button type="submit">Modifier</button>
                </form>
            </li>
            <hr>
        <?php } ?>
    <?php } ?>
</ul>