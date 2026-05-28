<?php
require_once "bdd-crud.php";
session_start();

if (isset($_SESSION["user_id"]) == false) {
    header("Location: login.php");
    exit();
}

if(isset($_POST["title"]) && 
   isset($_POST["description"])) {

    add_task($_SESSION["user_id"], $_POST["title"], $_POST["description"]);
    
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- TODO Formulaire pour ajouter une tâche -->
     <form action="" method="post">
        <label>User <input type="text" name="user_id"></label>
        <label>Titer <input type="text" name="title"></label>
        <label>Description <input type="text" name="description"></label>
        <button>Nouvelle tâche</button>
    </form>
</body>
</html>