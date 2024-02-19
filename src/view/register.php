<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription | MMISTIK</title>
    <link rel="stylesheet" href="assets/css/global.css" />
    <link rel="stylesheet" href="assets/css/register.css" />
</head>

<body>
    <div class="card">
        <img src="assets/img/logo-couleur.png" alt="MMISTIK" class="logo" />
        <h1>Décline ton identité</h1>
        <form action="index.php/?page=register" method="post">
            <div class="input-group">
                <label for="pseudo">Nom d'utilisateur</label>
                <input type="text" name="pseudo" id="pseudo" required />
            </div>
            <div class="input-group">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" required />
            </div>
            <button type="submit" class="btn">S'inscrire</button>
        </form>
    </div>
</body>

</html>