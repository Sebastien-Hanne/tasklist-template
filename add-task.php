<?php
require_once "bdd-crud.php";
if(
    isset($_POST["user_id"]) && 
    isset($_POST["title"]) && 
    isset($_POST["description"])) {

    add_task($_POST["user_id"],$_POST["title"],$_POST["description"]);
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