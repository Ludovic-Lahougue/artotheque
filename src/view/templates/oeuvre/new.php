<h1>Nouvelle oeuvre</h1>
<a href="?controller=oeuvre&action=liste">Retour à la liste</a>
<hr>
<form method="POST" action="/?controller=oeuvre&action=new">
    <div>
        <label for="type">Type</label>
        <select name="type" id="type">
            <option selected value="Peinture">Peinture</option>
            <option value="Sculpture">Sculpture</option>
            <option value="Film">Film</option>
        </select>
    </div>
    <div>
        <label for="description">Titre</label>
        <input type="text" name="description" id="description" required>
    </div>
    <div>
        <label for="auteur">Auteur</label>
        <select name="auteur" id="auteur" required>
            <option selected value="null">Aucun</option>
            <?php foreach($content['auteurs'] as $auteur) { ?>
                <option value="<?php echo $auteur->getEmail() ?>"><?php echo $auteur->getPrenom() ?? null; echo " "; echo $auteur->getNom() ?? null ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label for="code">Code</label>
        <input type="text" name="code" id="code" required>
    </div>
    <div>
        <label for="masse">Masse</label>
        <input type="number" name="masse" id="masse">
        kg
    </div>
    <button type="submit">Ajouter</button>
</form>