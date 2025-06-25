<?php
require_once __DIR__ . '/../config/database.php';

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

function get_registration_by_user($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM fiches_inscription WHERE utilisateur_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetch();
}

function update_registration_address($id, $adresse) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE fiches_inscription SET adresse = ?, date_soumission = NOW() WHERE id = ?");
    return $stmt->execute([$adresse, $id]);
}

function count_total_students() {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM utilisateurs WHERE role = 'etudiant'");
    return $stmt->fetchColumn();
}

function count_fiches_by_statut($statut) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM fiches_inscription WHERE statut = ?");
    $stmt->execute([$statut]);
    return $stmt->fetchColumn();
}
?>
