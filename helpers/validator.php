<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
// Valide le format d'un email
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Vérifie qu'un champ n'est pas vide
function validate_required($value) {
    return !empty(trim($value));
}

// Valide le format d'un numéro de téléphone
function validate_phone($phone) {
    return preg_match('/^[0-9+\-\s]{8,20}$/', $phone);
}

// Valide le format d'un nom (lettres, espaces, tirets)
function validate_name($name) {
    return preg_match('/^[a-zA-Z\s\-\']{2,50}$/', $name);
}

// Valide le format d'une date (Y-m-d)
function validate_date($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

// Nettoie et échappe une chaîne de caractères
function sanitize_string($string) {
    return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
}
?>
