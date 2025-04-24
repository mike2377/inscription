<?php
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_required($value) {
    return !empty(trim($value));
}
?>
