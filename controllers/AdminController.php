<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../models/RegistrationModel.php';
require_once __DIR__ . '/../models/UserModel.php';

// Vérifie les droits d'accès administrateur
if (!is_admin()) {
    header('Location: ../views/home.php');
    exit;
}

// Récupère la liste de toutes les fiches d'inscription avec infos utilisateur
global $pdo;
$stmt = $pdo->query("
    SELECT f.*, u.nom, u.prenom, u.email
    FROM fiches_inscription f
    JOIN utilisateurs u ON f.utilisateur_id = u.id
");
$fiches = $stmt->fetchAll();

// Affiche la vue liste des étudiants
include_once __DIR__ . '/../views/admin/students.php';
?>
