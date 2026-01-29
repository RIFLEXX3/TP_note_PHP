<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Liste des régions</h2>

<label for="region-select">Choisissez une région &nbsp;:</label>

<form action="/departement" method="get">

<select name="region" id="id_region">
    <option value="">-- Afficher tous les départements --</option>
    <?php foreach ($regions as $reg) { ?>
        <option value="<?= $reg['insee'] ?>"><?= $reg['nom']; ?></option>
    <?php } ?> 
</select>

<button>Afficher</button>

</form>


    
</body>
</html>