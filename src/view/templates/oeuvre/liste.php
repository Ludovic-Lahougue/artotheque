<a href="/?controller=oeuvre&action=new">Nouvelle oeuvre</a>
<h3>Liste des oeuvres :</h3>
<?php

use App\model\interfaces\Caracteristique;

 if(isset($content['oeuvres'])) { ?>
    <ul>
        <?php foreach($content['oeuvres'] as $type => $oeuvres) { ?>
            <li>
                <h3><?php echo "{$type} : " ?></h3>
                <?php foreach($oeuvres as $oeuvre) { ?>
                    <ul>
                        <li>
                            <p>Titre : <?php echo $oeuvre->getDescription() ?? "Non défini" ?></p>
                            <p>Auteur : <?php echo "{$oeuvre->getAuteur()->getPrenom()} {$oeuvre->getAuteur()->getNom()}" ?></p>
                            <p>Code : <?php echo $oeuvre->getCode() ?? "Non défini" ?></p>
                            <?php if($oeuvre instanceof Caracteristique) { ?>
                                <p>Masse : <?php echo $oeuvre->getWeight() ?? "Non défini" ?> kg</p>
                                <?php } ?>
                            <p>Etat : <?php echo $oeuvre->getEtat() ?? "Non défini" ?></p>
                            <form method="POST" action="/?controller=oeuvre&action=delete" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette oeuvre ?')">
                                <input type="hidden" name="code" value="<?php echo $oeuvre->getCode() ?>" />
                                <button type="submit">Supprimer</button>
                            </form>
                        </li>
                        <hr>
                    </ul>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>