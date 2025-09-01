 Créer la base de données
CREATE DATABASE IF NOT EXISTS quiz_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

Utiliser la base de données
USE quiz_app;

Créer la table participants
CREATE TABLE IF NOT EXISTS participants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  whatsapp VARCHAR(30) NOT NULL,
  score INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);