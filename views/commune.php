<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Liste des commmunes du <?= $_GET['departement'] ?></h2>

<a href="/departement">Retour à la liste des départements</a>
    
<label for="departement-select">Choisissez un département &nbsp;:</label>

<form action="/commune" method="get"> <!-- par défaut si on ne met pas de methodes, c'est la méthode GET -->

<select name="departement" id="id_departement" onchange="this.form.submit()"> <!-- onchange submit permet de faire l'action du bouton sans cliquer -->
    <?php foreach ($departements as $dep) {
        $selected = '';
        if (isset($_GET['departement']) && $dep['insee'] == $_GET['departement']) { // $_GET permet de recuperer la valeur dans l'url
            $selected = ' selected';
        } 
?>
         <option <?= $selected ?> value="<?= $dep['insee'] ?>"><?= $dep['nom']; ?></option> 
    <?php } ?> 
</select>

<!-- <button>Afficher</button> -->

</form>


<table border = 1>

<th>Code INSEE</th>
<th>Nom de la commune</th>
    
        <?php foreach ($communes as $com) { ?>
            <tr>
                <td><?= $com['insee']; ?></td>
                <td><?= $com['nom']; ?></td>
                <td><a href="/villes2?insee=<?= $com['insee'] ?>">Voir sur la carte</a></td>            
            </tr>
        <?php } ?>
    
</table>



</body>
</html>