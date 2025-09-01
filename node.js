// server.js - Serveur Node.js avec Express const express = require('express'); const bodyParser = require('body-parser'); const fs = require('fs'); const path = require('path'); const app = express(); const port = 3000;

let participants = [];




app.use(express.static('public')); app.use(bodyParser.urlencoded({ extended: true })); app.use(bodyParser.json());

// Route pour enregistrement score app.post('/save_score', (req, res) => { const { name, email, whatsapp, score } = req.body; const participant = { name, email, whatsapp, score, created_at: new Date() }; participants.push(participant); fs.writeFileSync('participants.json', JSON.stringify(participants, null, 2)); res.sendStatus(200); });

// Route admin protégée par mot de passe simple (à améliorer pour production) app.get('/admin', (req, res) => { const html = `<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultats - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container py-5">
  <h2 class="mb-4">Résultats des participants</h2>
  <table class="table table-dark table-striped">
    <thead>
      <tr><th>Nom</th><th>Email</th><th>WhatsApp</th><th>Score</th><th>Date</th></tr>
    </thead>
    <tbody>
      ${participants.map(p => `<tr>
        <td>${p.name}</td>
        <td>${p.email}</td>
        <td>${p.whatsapp}</td>
        <td>${p.score}</td>
        <td>${new Date(p.created_at).toLocaleString()}</td>
      </tr>`).join('')}
    </tbody>
  </table>
</div>
</body>
</html>`;
  res.send(html);
});app.listen(port, () => { console.log(Serveur actif sur http://localhost:${port}); });

// Arborescence du dossier public : // public/ // ├── index.html // ├── quiz.html // ├── style.css // ├── questions.js // └── script.js

// Place tous les fichiers HTML, CSS, JS dans le dossier 'public'.

// Commandes : // 1. npm init -y // 2. npm install express body-parser // 3. node server.js

// Les scores sont enregistrés dans participants.json en local.
// Rappel utilisé le serveur
