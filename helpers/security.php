<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
/**
 * Fonctions de sécurité pour échapper les données
 */

// Échappe les données pour l'affichage HTML (protection XSS)
function escape_html($data) {
    if (is_array($data)) {
        return array_map('escape_html', $data);
    }
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Nettoie les données d'entrée utilisateur
function sanitize_input($data) {
    if (is_array($data)) {
        return array_map('sanitize_input', $data);
    }
    return trim(strip_tags($data));
}

// Valide le token CSRF pour éviter les attaques
function validate_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Génère un token CSRF unique pour la session
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
?>