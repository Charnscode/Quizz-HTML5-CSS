<?php
// submit.php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $whatsapp = $_POST["whatsapp"] ?? '';
    $score = $_POST["score"] ?? 0;

    if ($name && $email && $whatsapp) {
        $stmt = $pdo->prepare("INSERT INTO participants (name, email, whatsapp, score, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $whatsapp, $score]);
        echo "OK";
    } else {
        echo "Champs invalides";
    }
}
?>