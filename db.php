<?php
// db.php

$host = "localhost";
$user = "root";
$password = ""; // Change si ton mot de passe MySQL n’est pas vide
$dbname = "quiz_app";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>