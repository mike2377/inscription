<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur est connecté
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Vérifie si l'utilisateur connecté est un administrateur
function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Force la connexion - redirige vers login si non connecté
function require_login() {
    if (!is_logged_in()) {
        header('Location: ' . BASE_URL . 'views/auth/login.php');
        exit;
    }
}
?>
