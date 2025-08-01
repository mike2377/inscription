<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
require_once __DIR__ . '/../config/database.php';

// Enregistre un document uploadé pour une fiche d'inscription
function upload_document_for_registration($fiche_id, $type, $filename) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO documents (fiche_id, type_document, chemin) VALUES (?, ?, ?)");
    return $stmt->execute([$fiche_id, $type, $filename]);
}

// Récupère tous les documents d'une fiche d'inscription
function get_documents_for_fiche($fiche_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM documents WHERE fiche_id = ?");
    $stmt->execute([$fiche_id]);
    return $stmt->fetchAll();
}
?>
