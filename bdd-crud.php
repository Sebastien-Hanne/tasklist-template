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


function connect_database() : PDO {
    $database = new PDO("mysql:host=db;dbname=app-database","root","root");
    return $database;
}

// CRUD User
function create_user(string $username, string $email, string $password) : int | null {
    $database = connect_database();
    $request = $database->prepare("INSERT INTO User (username, email, password) VALUES (?, ?, ?)");
    $isSuccessful = $request->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);
    if($isSuccessful){
        return $database->lastInsertId();
    }
    return null;
}

function get_user(string $email) : array | false {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM User WHERE email=?");
    $request->execute([$email]);
    return $request->fetch(PDO::FETCH_ASSOC);
}

// CRUD Task
function add_task(string $user_id, string $title, string $description) : int | null {
    $database = connect_database();
    $request = $database->prepare("INSERT INTO Task (title, description, user_id) VALUES (?, ?, ?)");
    $request->execute([$title, $description, $user_id]); // ✅ corrigé
    return $database->lastInsertId();
}

function get_task(int $id) : array | null {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM Task WHERE id=?"); // ✅ corrigé
    $request->execute([$id]);
    return $request->fetch(PDO::FETCH_ASSOC);
}

function get_all_task(int $user_id) : array | null {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM Task WHERE user_id=?");
    $request->execute([$user_id]);
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

function delete_task(int $id) : bool {
    $database = connect_database();
    $request = $database->prepare("DELETE FROM Task WHERE id=?");
    return $request->execute([$id]);
}

// BONUS
function validate_task(int $id) : bool {
    $database = connect_database();
    $request = $database->prepare("UPDATE Task SET validated = 1 WHERE id=?"); // ✅ ajoutée
    return $request->execute([$id]);
}