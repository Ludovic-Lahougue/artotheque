<h1>Nouvelle Salle</h1>
<a href="?controller=salle&action=liste">Retour à la liste</a>
<hr>
<form method="POST" action="/?controller=salle&action=new">
    <div>
        <label for="id">Id</label>
        <input type="text" name="id" required>
    </div>
    <div>
        <label for="type">Oeuvres</label>
        <select name="oeuvres[]" id="type" multiple>
            <?php foreach($content['oeuvres'] as $oeuvre) { ?>
                <option value="<?php echo $oeuvre->getCode() ?>"><?php echo $oeuvre->getDescription() ?? null ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit">Ajouter</button>
</form>