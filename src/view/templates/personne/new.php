<h1>Nouvelle Personne</h1>
<a href="?controller=personne&action=liste">Retour à la liste</a>
<hr>
<form method="POST" action="/?controller=personne&action=new">
    <div>
        <label for="type">Type</label>
        <select name="type" id="type">
            <option selected value="Auteur">Auteur</option>
            <option value="Commissaire">Commissaire</option>
            <option value="Usager">Usager</option>
        </select>
    </div>
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" idTitre="prenom" required>
    </div>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" idTitre="nom" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
    </div>
    <div>
        <label for="telephone">Téléphone</label>
        <input type="text" name="telephone" id="telephone">
    </div>
    <button type="submit">Ajouter</button>
</form>