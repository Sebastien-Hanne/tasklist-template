<?php
require_once "bdd-crud.php";
session_start();

if(isset($_SESSION["user_id"]) == true){
    header("Location: index.php");
    exit();
}

if (isset($_POST["email"])) {
    $user_id = get_user($_POST["email"]);  
    
    if($user_id && password_verify($_POST["password"], $user_id["password"])){
        $_SESSION["user_id"] = $user_id["id"];
        header("Location: index.php");
        exit();
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
        <label>Nom <input type="text" name="username"></label><br>
        <br><label>E-mail <input type="email" name="email"></label><br>
        <br><label>Mot de passe <input type="password" name="password"></label><br>
        <br><button>Se connecter</button>
    </form><br>
    <a href="inscription.php">Pas de compte ? S'inscrire</a>
</body>
</html>