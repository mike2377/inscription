<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
require_once __DIR__ . '/../config/database.php';

// Crée une nouvelle fiche d'inscription
function create_registration($data) {
    global $pdo;
    $sql = "INSERT INTO fiches_inscription 
        (utilisateur_id, date_naissance, lieu_naissance, sexe, nationalite, adresse, diplome, 
         etablissement_precedent, formation, specialisation, statut) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'en_attente')";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $data['utilisateur_id'],
        $data['date_naissance'],
        $data['lieu_naissance'],
        $data['sexe'],
        $data['nationalite'],
        $data['adresse'],
        $data['diplome'],
        $data['etablissement_precedent'],
        $data['formation'],
        $data['specialisation']
    ]);
}

// Récupère la fiche d'inscription d'un utilisateur
function get_registration_by_user($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM fiches_inscription WHERE utilisateur_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch();
}

// Met à jour l'adresse d'une fiche d'inscription
function update_registration_address($id, $adresse) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE fiches_inscription SET adresse = ?, date_soumission = NOW() WHERE id = ?");
    return $stmt->execute([$adresse, $id]);
}

// Compte le nombre total d'étudiants
function count_total_students() {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM utilisateurs WHERE role = 'etudiant'");
    return $stmt->fetchColumn();
}

// Compte les fiches par statut (en_attente, validee, refusee)
function count_fiches_by_statut($statut) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM fiches_inscription WHERE statut = ?");
    $stmt->execute([$statut]);
    return $stmt->fetchColumn();
}
?>
