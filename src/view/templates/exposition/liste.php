<h3>Liste des expositions :</h3>
<ul>
    <?php if(isset($content['expositions'])) { ?>
        <?php foreach($content['expositions'] as $exposition) { ?>
            <li>
                <p>Thème : <?php echo "{$exposition->getTheme()}" ?></p>
                <p>Commissaire : <?php echo "{$exposition->getCommissaire()->getPrenom()} {$exposition->getCommissaire()->getNom()}" ?></p>
                <p>Salles concernées : <?php echo count($exposition->getSalles()) ?></p>
            </li>
        <?php } ?>
    <?php } ?>
</ul>