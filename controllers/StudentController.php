<?php
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../models/RegistrationModel.php';
require_login();

$user_id = $_SESSION['user_id'];
$fiche = get_registration_by_user($user_id);
include_once __DIR__ . '/../views/student/profile.php';
?>
