<?php
require_once "bdd-crud.php";

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
   <!-- TODO Formulaire pour s'inscrire (créer un utilisateur) -->
    <form action="" method="post">
        <label>Nom <input type="text" name="username"></label>
        <label>E-mail <input type="email" name="email"></label>
        <label>Mot de passe <input type="password" name="password"></label>
        <button>S'inscrire</button>
    </form>
</body>

</html>