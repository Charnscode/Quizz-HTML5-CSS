<?php
// admin.php
require 'db.php';

// Option de protection simple par mot de passe (à améliorer en production)
$admin_password = 'votre_mot_de_passe_admin'; // change-le
session_start();

if (isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin'] = true;
    } else {
        $error = "Mot de passe incorrect.";
    }
}

if (!isset($_SESSION['admin'])):
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Accès Administrateur</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" required />
      <button type="submit">Connexion</button>
    </form>
  </div>
</body>
</html>

<?php
exit;
endif;

// Affichage des résultats si connecté comme admin
$stmt = $pdo->query("SELECT * FROM participants ORDER BY created_at DESC");
$participants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultats du Quiz</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Résultats des participants</h2>
    <table border="1" cellpadding="8" cellspacing="0" style="width:100%; background:#fff; color:#000;">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>WhatsApp</th>
          <th>Score</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($participants as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= htmlspecialchars($p['email']) ?></td>
            <td><?= htmlspecialchars($p['whatsapp']) ?></td>
            <td><?= $p['score'] ?>/10</td>
            <td><?= $p['created_at'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>