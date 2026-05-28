<?php
require_once "bdd-crud.php";
session_start();

if (isset($_SESSION["user_id"]) == false) {
    header("Location: login.php");
    exit();
}

if (isset($_GET["id"])) {
    delete_task($_GET["id"]);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une tache</title>
</head>
<body>
    <a href="delete-task.php?id=<?= $task["id"] ?>">Supprimer</a>
</body>
</html>