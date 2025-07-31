<?php
require_once "bdd-crud.php";
// TODO Connection Utilisateur via la session
session_start();
if (
    isset($_POST["email"]) && 
    isset($_POST["password"])
    ) {
        $database = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
        $requete = $database->prepare("SELECT * FROM User WHERE email=?");
        $requete->execute([
        $_POST["email"]
    ]);
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    if ($_POST["password"] == $user["password"]) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: index.php");
    }
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Connexion</h1>
    <!-- TODO Formulaire de connexion -->
     <form action="" method="post">
        <label>Nom <input type="text" name="username"></label>
        <label>E-mail <input type="email" name="email"></label>
        <label>Mot de passe <input type="password" name="password"></label>
        <button>Se connecter</button>
    </form>
    <a href="inscription.php">Pas de compte ? S'inscrire</a>
</body>
</html>