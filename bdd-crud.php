<?php
/**
 * Ce fichier contient les fonctions de CRUD pour les utilisateurs et les tâches.
 * Il est utilisé pour interagir avec la base de données.
 * Presque toutes les pages de l'application utilisent ce fichier.
 * 
 * A vous de remplir ces fonction pour qu'elles fonctionnent correctement.
 * 
 * Vous pourrez ainsi facilment les utiliser dans les autres fichiers et construire votre site sans plus vous soucis du SQL.
 */


function connect_database() : PDO{
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database","root","root");
    return $database;
}
// CRUD User
// Create (signin)
function create_user(string $user_id, string $email,string $password) : int | null {
    $database = connect_database();
    // TODO
        $request = $database->prepare("INSERT INTO User (username, email, password) VALUES (?, ?, ?)");
        $request->execute([$user_id, $email, $password]);
        $user_id = $database->lastInsertId();
    return $user_id;
}
// Read (login)
function get_user(int $email) : array | null {
    $database = connect_database();
    // TODO 
    $request = $database->prepare("SELECT * FROM User WHERE email=?");
    $request->execute([ $email]);
    $user = $request->fetch(PDO::FETCH_ASSOC);
    return $user;
}


// CRUD Task
// Create
function add_task(string $task_id, string $title,string $description) : int | null {
    $database = connect_database();
    $request = $database->prepare("INSERT INTO Task (title, description, user_id) VALUES (?, ?, ?)");
    $request->execute([$task_id, $description, $title]);
    $task_id = $database->lastInsertId();
    return $task_id;
}

//Read
function get_task(int $task) : array | null {
    $database = connect_database();
    // TODO
        $request = $database->prepare("SELECT * FROM Task WHERE title=?");
        $request->execute([ $task]);
        $task = $request->fetch(PDO::FETCH_ASSOC);
    return $task;
}

function get_all_task(int $user_id) : array | null {
    $database = connect_database();
    // TODO
    $request = $database->prepare("SELECT * FROM Task WHERE user_id=?");
    $request->execute([ $user_id ]);
    $tasks = $request->fetchAll(PDO::FETCH_ASSOC);
    return $tasks;
}

// Delete (BONUS)
function delete_task(int $id) : bool{
    $database = connect_database();
    // TODO
    $request = $database->prepare("DELETE FROM Task WHERE id=?");
    $isSuccessful = $request->execute([ $id ]);
    return $isSuccessful;
}