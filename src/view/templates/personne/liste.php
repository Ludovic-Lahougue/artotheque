<a href="/?controller=personne&action=new">Nouvelle Personne</a>
<h3>Liste des personnes :</h3>
<?php

use App\model\classe\personne\Auteur;

if(isset($content['personnes'])) { ?>
    <ul>
        <?php foreach($content['personnes'] as $type => $personnes) { ?>
            <li>
                <h3><?php echo "{$type} : " ?></h3>
                <?php foreach($personnes as $personne) { ?>
                    <ul>
                        <li>
                            <p>nom : <?php echo $personne->getPrenom() ?? null; echo " "; echo $personne->getNom() ?? null ?></p>
                            <p>email : <?php echo $personne->getEmail() ?? "Non défini" ?></p>
                            
                            <?php if($personne instanceof Auteur) { ?>
                                <p>Téléphone : <?php echo $personne->getTelephone() ?? "Non défini" ?></p>
                                <?php if (count($personne->getOeuvres())> 0) { ?>
                                    <p>Oeuvres de cet auteur :</p>
                                    <ul>
                                        <?php foreach($personne->getOeuvres() as $oeuvre) {?>
                                            <li>
                                                <?php echo $oeuvre->getDescription() ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } else { ?>
                                    <p>Cet auteur n'a pas d'oeuvres.</p>
                                <?php } ?>
                            <?php } ?>

                            <?php if (count($personne->getEmprunts())> 0) { ?>
                                <p>Emprunts de cette personne : </p>
                                <ul>
                                    <?php foreach($personne->getEmprunts() as $oeuvre) {?>
                                        <li>
                                            <?php echo $oeuvre->getDescription() ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } else { ?>
                                <p>Cet personne n'a rien emprunté.</p>
                            <?php } ?>
                            <form method="POST" action="/?controller=personne&action=delete" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette personne ?')">
                                <input type="hidden" name="email" value="<?php echo $personne->getEmail() ?>" />
                                <button type="submit">Supprimer</button>
                            </form>
                            <form method="POST" action="/?controller=personne&action=modify">
                                <input type="hidden" name="email" value="<?php echo $personne->getEmail() ?>" />
                                <button type="submit">Modifier</button>
                            </form>
                        </li>
                    </ul>
                    <hr>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
</ul>