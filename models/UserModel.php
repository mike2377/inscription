<?php
require_once __DIR__ . '/../config/database.php';

function create_user($nom, $prenom, $email, $telephone, $mot_de_passe, $role = 'etudiant') {
    global $pdo;
    try {
        $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, telephone, mot_de_passe, role) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$nom, $prenom, $email, $telephone, $hash, $role]);
    } catch (PDOException $e) {
        error_log("Error creating user: " . $e->getMessage());
        return false;
    }
}

function get_user_by_email($email) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Error getting user by email: " . $e->getMessage());
        return false;
    }
}

function get_user_by_id($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Error getting user by ID: " . $e->getMessage());
        return false;
    }
}
?>
