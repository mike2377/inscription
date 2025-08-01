CREATE DATABASE IF NOT EXISTS inscription_db;
USE inscription_db;

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    telephone VARCHAR(20),
    mot_de_passe VARCHAR(255),
    role ENUM('etudiant', 'admin') DEFAULT 'etudiant',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE fiches_inscription (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    date_naissance DATE,
    lieu_naissance VARCHAR(100),
    sexe VARCHAR(10),
    nationalite VARCHAR(100),
    adresse VARCHAR(255),
    email VARCHAR(100),
    telephone VARCHAR(30),
    diplome VARCHAR(100),
    etablissement_precedent VARCHAR(100),
    formation VARCHAR(100),
    specialisation VARCHAR(100),
    urgence_nom VARCHAR(100),
    urgence_relation VARCHAR(100),
    urgence_telephone VARCHAR(30),
    urgence_email VARCHAR(100),
    statut ENUM('en_attente', 'validee', 'refusee') DEFAULT 'en_attente',
    commentaires TEXT,
    date_soumission DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
);

CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fiche_id INT,
    type_document VARCHAR(100),
    chemin VARCHAR(255),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (fiche_id) REFERENCES fiches_inscription(id)
);

-- Données de test avec mots de passe sécurisés
-- Les mots de passe sont hachés avec password_hash() de PHP (algorithme bcrypt)
-- Commande utilisée: password_hash('motdepasse', PASSWORD_DEFAULT)

-- Insérer un admin (mot de passe: admin123)
INSERT INTO utilisateurs (email, telephone, mot_de_passe, role)
VALUES ('admin@gmail.com', '656332190', '$2y$10$2HNCELJmps8Q/QcVF.Ce9ORiCxSDPry8EAuKeQKfEEyHoujLIrgpG', 'admin');

