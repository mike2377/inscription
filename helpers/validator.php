<?php
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_required($value) {
    return !empty(trim($value));
}

function validate_phone($phone) {
    return preg_match('/^[0-9+\-\s]{8,20}$/', $phone);
}

function validate_name($name) {
    return preg_match('/^[a-zA-Z\s\-\']{2,50}$/', $name);
}

function validate_date($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

function sanitize_string($string) {
    return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
}
?>
