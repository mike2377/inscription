

<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
require_once __DIR__ . '/../models/UserModel.php';

// Traitement de la déconnexion utilisateur
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_start();
    session_unset();
    session_destroy();
    header('Location: /inscription/index.php');
    exit;
}

// Traitement des requêtes POST (inscription et connexion)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de l'inscription d'un nouvel utilisateur
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $password = $_POST['mot_de_passe'];

        if (create_user($nom, $prenom, $email, $telephone, $password)) {
            header('Location: ../views/auth/login.php?success=1');
        } else {
            echo 'Erreur lors de la création du compte.';
        }

    // Traitement de la connexion utilisateur
    } elseif (isset($_POST['action']) && $_POST['action'] === 'login') {
        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];
        $user = get_user_by_email($email);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] === 'admin') {
                header('Location: /inscription/index.php?page=admin_dashboard');
            } else {
                header('Location: /inscription/index.php?page=student_dashboard');
            }
            exit;
        } else {
            echo 'Identifiants invalides.';
        }
    }
}
?>
