<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Identification</h2>

<?php if ($user == null) { ?>

<form action="/login" method="post" id="id_form">
    <div>
        <label for="username">Pseudo :</label>
        <input type="text" id="user" name="user" placeholder="Pseudo" required>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Mot de passe" required>
    </div>
    <input type="submit" value="S'authentifier">
    <input type="reset" value="Annuler" />
</form>

<?php } else { ?>
    <p> Connecté en tant que : <?= $user ?></p>
    <a href="/logout">Se déconnecter</a>
    <form action="/logout">
        <button>Se déconnecter</button>
    </form>
<?php } ?>

</body>
</html>
