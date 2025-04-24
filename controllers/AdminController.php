<?php
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../models/RegistrationModel.php';
require_once __DIR__ . '/../models/UserModel.php';

if (!is_admin()) {
    header('Location: ../views/home.php');
    exit;
}

// Liste de tous les étudiants (fiches)
global $pdo;
$stmt = $pdo->query("
    SELECT f.*, u.nom, u.prenom, u.email
    FROM fiches_inscription f
    JOIN utilisateurs u ON f.utilisateur_id = u.id
");
$fiches = $stmt->fetchAll();

include_once __DIR__ . '/../views/admin/students.php';
?>
