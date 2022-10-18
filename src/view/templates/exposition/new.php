<h1>Nouvelle Exposition</h1>
<a href="?controller=exposition&action=liste">Retour à la liste</a>
<hr>
<form method="POST" action="/?controller=exposition&action=new">
    <div>
        <label for="theme">Thème</label>
        <input type="text" name="theme" required>
    </div>
    <div>
        <label for="type">Salles</label>
        <select name="salles[]" id="type" multiple>
            <?php foreach($content['salles'] as $salles) { ?>
                <option value="<?php echo $salles->getId() ?>"><?php echo $salles->getId() ?? null ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit">Ajouter</button>
</form>