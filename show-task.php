<?php
require_once "bdd-crud.php";
session_start();

if (isset($_SESSION["user_id"]) == false) {
    header("Location: login.php");
    exit();
}

$task = null;
if (isset($_GET["id"])) {
    $task = get_task($_GET["id"]);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de la tâche</title>
</head>
<body>
    <?php if($task): ?>

        <h1><?= $task["title"] ?></h1>
        <p><?= $task["description"] ?></p>

        <a href="index.php">Retour à la liste</a>
        <a href="delete-task.php?id=<?= $task["id"] ?>">Supprimer</a>

    <?php else: ?>
        <p>Tâche introuvable !</p>
        <a href="index.php">Retour à la liste</a>
    <?php endif; ?>
</body>
</html>