<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Liste des départements</h2>

<label for="region-select">Choisissez une région &nbsp;:</label>

<form action="/departement" method="get"> <!-- par défaut si on ne met pas de methodes, c'est la méthode GET -->

<select name="region" id="id_region" onchange="this.form.submit()"> <!-- Ajout de onchange pour soumettre le formulaire automatiquement -->
    <?php foreach ($regions as $reg) { 
        $selected = '';
        if (isset($_GET['region']) && $reg['insee'] == $_GET['region']) { // $_GET permet de recuperer la valeur dans l'url
            $selected = ' selected';
        } ?>
        <option <?= $selected ?> value="<?= $reg['insee'] ?>"><?= $reg['nom']; ?></option> <!-- < ? = $selected ?> -->
    <?php } ?> 
</select>

<!-- <button>Afficher</button> -->

</form>

<table border = 1>

<th>Code INSEE</th>
<th>Nom du département</th>
    
        <?php foreach ($departements as $dep) { ?>
            <tr>
                <td><?= $dep['insee']; ?></td>
                <td><a href="/commune?departement=<?= $dep['insee']; ?>"><?= $dep['nom']; ?></a></td>
            </tr>
        <?php } ?>
    
</table>



</body>
</html>
