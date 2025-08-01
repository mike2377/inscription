<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
require_once __DIR__ . '/../helpers/auth.php';
require_once __DIR__ . '/../models/RegistrationModel.php';
require_once __DIR__ . '/../models/DocumentModel.php';

// Vérifie que l'utilisateur est connecté
require_login();

// Récupère les données de l'utilisateur connecté
$user_id = $_SESSION['user_id'];
$fiche = get_registration_by_user($user_id);

// Gestion des documents : upload, suppression, remplacement
$upload_success = '';
if ($fiche && isset($fiche['id'])) {
    // Traitement de l'upload de nouveaux documents
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['delete_document_id']) && empty($_POST['replace_document_id'])) {
        $types = [
            'piece_identite' => "Pièce d'identité",
            'diplomes' => 'Diplômes',
            'photo_identite' => "Photo d'identité",
            'justificatif_domicile' => 'Justificatif de domicile'
        ];
        foreach ($types as $input => $type_doc) {
            if (!empty($_FILES[$input]['name'])) {
                $filename = basename($_FILES[$input]['name']);
                $target = 'uploads/' . uniqid($input . '_') . '.' . pathinfo($filename, PATHINFO_EXTENSION);
                if (move_uploaded_file($_FILES[$input]['tmp_name'], __DIR__ . '/../' . $target)) {
                    upload_document_for_registration($fiche['id'], $type_doc, $target);
                    $upload_success = "Document '$type_doc' téléversé avec succès.";
                }
            }
        }
    }
    // Traitement de la suppression d'un document
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['delete_document_id'])) {
        $doc_id = intval($_POST['delete_document_id']);
        // Récupérer le chemin du document pour suppression physique
        $docs = get_documents_for_fiche($fiche['id']);
        foreach ($docs as $doc) {
            if ($doc['id'] == $doc_id) {
                $file_path = __DIR__ . '/../' . $doc['chemin'];
                if (file_exists($file_path)) unlink($file_path);
                // Supprimer de la base
                global $pdo;
                $stmt = $pdo->prepare("DELETE FROM documents WHERE id = ?");
                $stmt->execute([$doc_id]);
                $upload_success = "Document supprimé.";
                break;
            }
        }
    }
    // Traitement du remplacement d'un document
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['replace_document_id']) && !empty($_FILES['replace_file']['name'])) {
        $doc_id = intval($_POST['replace_document_id']);
        $docs = get_documents_for_fiche($fiche['id']);
        foreach ($docs as $doc) {
            if ($doc['id'] == $doc_id) {
                // Supprimer l'ancien fichier
                $file_path = __DIR__ . '/../' . $doc['chemin'];
                if (file_exists($file_path)) unlink($file_path);
                // Upload du nouveau fichier
                $filename = basename($_FILES['replace_file']['name']);
                $target = 'uploads/' . uniqid('doc_') . '.' . pathinfo($filename, PATHINFO_EXTENSION);
                if (move_uploaded_file($_FILES['replace_file']['tmp_name'], __DIR__ . '/../' . $target)) {
                    global $pdo;
                    $stmt = $pdo->prepare("UPDATE documents SET chemin = ? WHERE id = ?");
                    $stmt->execute([$target, $doc_id]);
                    $upload_success = "Document remplacé avec succès.";
                }
                break;
            }
        }
    }
    // Met à jour la liste des documents après modifications
    $documents = get_documents_for_fiche($fiche['id']);
}

// Routage vers la vue appropriée selon la page demandée
if (isset($_GET['page']) && $_GET['page'] === 'student_upload_documents') {
    include_once __DIR__ . '/../views/student/upload-documents.php';
    exit;
}
// Vue par défaut : profil étudiant
include_once __DIR__ . '/../views/student/profile.php';
?>
