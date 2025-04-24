<?php
// Point d'entrée principal de l'application
session_start();

// Inclusion des constantes et de la configuration de la base de données
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/config/database.php';

// Inclusion des helpers
require_once __DIR__ . '/helpers/auth.php';
require_once __DIR__ . '/helpers/uploader.php';
require_once __DIR__ . '/helpers/validator.php';

// Routage simple pour charger la bonne vue/contrôleur
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        require_once __DIR__ . '/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];

            // Connexion à la base de données
            $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $user['mot_de_passe'] === $mot_de_passe) { // Pour la sécurité, utilise password_hash plus tard !
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                if ($user['role'] === 'admin') {
                    header('Location: index.php?page=admin_dashboard');
                } elseif ($user['role'] === 'etudiant') {
                    header('Location: index.php?page=student_dashboard');
                } else {
                    header('Location: index.php?page=home');
                }
                exit;
            } else {
                $login_error = "Identifiants invalides";
            }
        }
        require_once __DIR__ . '/views/auth/login.php';
        break;
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $mot_de_passe = $_POST['mot_de_passe'];

            // Vérifier si l'email existe déjà
            $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $register_error = "Cet email est déjà utilisé.";
            } else {
                $stmt = $pdo->prepare('INSERT INTO utilisateurs (email, telephone, mot_de_passe, role) VALUES (?, ?, ?, ?);');
                $stmt->execute([$email, $telephone, $mot_de_passe, 'etudiant']);
                $register_success = "Inscription réussie. Vous pouvez maintenant vous connecter.";
            }
        }
        require_once __DIR__ . '/views/auth/register.php';
        break;
    case 'admin_dashboard':
        require_once __DIR__ . '/views/admin/dashboard.php';
        break;
    case 'admin_students':
        // Connexion à la base de données
        $stmt = $pdo->query('SELECT u.id, u.email, f.statut FROM utilisateurs u LEFT JOIN fiches_inscription f ON u.id = f.utilisateur_id WHERE u.role = "etudiant"');
        $fiches = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/views/admin/students.php';
        break;
    case 'admin_edit_student':
        if (isset($_GET['id'])) {
            $fiche_id = $_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fiche_id'], $_POST['statut'])) {
                $nv_statut = $_POST['statut'];
                // Correction : l'id de la fiche doit être l'id de la fiche_inscription, pas de l'utilisateur
                $stmt = $pdo->prepare('UPDATE fiches_inscription SET statut = ? WHERE utilisateur_id = ?');
                $stmt->execute([$nv_statut, $fiche_id]);
                $update_success = "Statut mis à jour !";
            }
            $stmt = $pdo->prepare('SELECT u.email, f.* FROM utilisateurs u LEFT JOIN fiches_inscription f ON u.id = f.utilisateur_id WHERE u.id = ?');
            $stmt->execute([$fiche_id]);
            $fiche = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        require_once __DIR__ . '/views/admin/edit-student.php';
        break;
    case 'student_dashboard':
        if (isset($_SESSION['user_id'])) {
            $etudiant_id = $_SESSION['user_id'];
           $stmt = $pdo->prepare('SELECT * FROM fiches_inscription WHERE utilisateur_id = ?');
            $stmt->execute([$etudiant_id]);
            $fiche = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        require_once __DIR__ . '/views/student/dashboard.php';
        break;
    case 'student_profile':
        if (isset($_SESSION['user_id'])) {
            $etudiant_id = $_SESSION['user_id'];
            $stmt = $pdo->prepare('SELECT u.email, f.* FROM utilisateurs u LEFT JOIN fiches_inscription f ON u.id = f.utilisateur_id WHERE u.id = ?');
            $stmt->execute([$etudiant_id]);
            $fiche = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        require_once __DIR__ . '/views/student/profile.php';
        break;
    case 'student_edit_profile':
        if (isset($_SESSION['user_id'])) {
            $etudiant_id = $_SESSION['user_id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $adresse = $_POST['adresse'] ?? '';
                $email = $_POST['email'] ?? '';
                $telephone = $_POST['telephone'] ?? '';
                $urgence_nom = $_POST['urgence_nom'] ?? '';
                $urgence_relation = $_POST['urgence_relation'] ?? '';
                $urgence_telephone = $_POST['urgence_telephone'] ?? '';
                $urgence_email = $_POST['urgence_email'] ?? '';
                // Autres champs non modifiables par l'étudiant (on les laisse inchangés)
                // Vérifie si la fiche existe déjà
                $stmt = $pdo->prepare('SELECT id FROM fiches_inscription WHERE utilisateur_id = ?');
                $stmt->execute([$etudiant_id]);
                $fiche_exist = $stmt->fetchColumn();
                if ($fiche_exist) {
                    // Met à jour la fiche
                    $stmt = $pdo->prepare('UPDATE fiches_inscription SET adresse=?, email=?, telephone=?, urgence_nom=?, urgence_relation=?, urgence_telephone=?, urgence_email=? WHERE utilisateur_id=?');
                    $stmt->execute([$adresse, $email, $telephone, $urgence_nom, $urgence_relation, $urgence_telephone, $urgence_email, $etudiant_id]);
                    $update_success = "Fiche mise à jour !";
                } else {
                    // Crée la fiche
                    $stmt = $pdo->prepare('INSERT INTO fiches_inscription (utilisateur_id, adresse, email, telephone, urgence_nom, urgence_relation, urgence_telephone, urgence_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                    $stmt->execute([$etudiant_id, $adresse, $email, $telephone, $urgence_nom, $urgence_relation, $urgence_telephone, $urgence_email]);
                    $update_success = "Fiche créée !";
                }
            }
            $stmt = $pdo->prepare('SELECT u.email, f.* FROM utilisateurs u LEFT JOIN fiches_inscription f ON u.id = f.utilisateur_id WHERE u.id = ?');
            $stmt->execute([$etudiant_id]);
            $fiche = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        require_once __DIR__ . '/views/student/edit-profile.php';
        break;
    case 'student_upload_documents':
        if (isset($_SESSION['user_id'])) {
            $etudiant_id = $_SESSION['user_id'];
            // Récupère la fiche
            $stmt = $pdo->prepare('SELECT id FROM fiches_inscription WHERE utilisateur_id = ?');
            $stmt->execute([$etudiant_id]);
            $fiche_id = $stmt->fetchColumn();
            if (!$fiche_id) {
                $upload_success = "Merci de compléter votre fiche avant d'envoyer des documents.";
                $documents = [];
            } else {
                // Upload
                $types = [
                    'piece_identite' => "Pièce d'identité",
                    'diplomes' => "Diplômes",
                    'photo_identite' => "Photo d'identité",
                    'justificatif_domicile' => "Justificatif de domicile"
                ];
                foreach ($types as $field => $label) {
                    if (!empty($_FILES[$field]['name'])) {
                        $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                        $filename = uniqid($field.'_', true) . '.' . $ext;
                        $dest = 'uploads/' . $filename;
                        if (!is_dir('uploads')) mkdir('uploads');
                        if (move_uploaded_file($_FILES[$field]['tmp_name'], $dest)) {
                            $stmt = $pdo->prepare('INSERT INTO documents (fiche_id, type_document, chemin) VALUES (?, ?, ?)');
                            $stmt->execute([$fiche_id, $label, $dest]);
                            $upload_success = ($upload_success ?? '') . " $label envoyé.";
                        }
                    }
                }
                // Liste des documents déjà envoyés
                $stmt = $pdo->prepare('SELECT type_document, chemin FROM documents WHERE fiche_id = ?');
                $stmt->execute([$fiche_id]);
                $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        require_once __DIR__ . '/views/student/upload-documents.php';
        break;
    case 'student_create_fiche':
        if (isset($_SESSION['user_id'])) {
            $etudiant_id = $_SESSION['user_id'];
            // Récupère les infos utilisateur
            $stmt = $pdo->prepare('SELECT email FROM utilisateurs WHERE id = ?');
            $stmt->execute([$etudiant_id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $date_naissance = $_POST['date_naissance'] ?? '';
                $lieu_naissance = $_POST['lieu_naissance'] ?? '';
                $sexe = $_POST['sexe'] ?? '';
                $nationalite = $_POST['nationalite'] ?? '';
                $adresse = $_POST['adresse'] ?? '';
                $email = $_POST['email'] ?? '';
                $telephone = $_POST['telephone'] ?? '';
                $diplome = $_POST['diplome'] ?? '';
                $etablissement_precedent = $_POST['etablissement_precedent'] ?? '';
                $formation = $_POST['formation'] ?? '';
                $specialisation = $_POST['specialisation'] ?? '';
                $urgence_nom = $_POST['urgence_nom'] ?? '';
                $urgence_relation = $_POST['urgence_relation'] ?? '';
                $urgence_telephone = $_POST['urgence_telephone'] ?? '';
                $urgence_email = $_POST['urgence_email'] ?? '';
                // Crée la fiche
                $stmt = $pdo->prepare('INSERT INTO fiches_inscription (utilisateur_id, date_naissance, lieu_naissance, sexe, nationalite, adresse, email, telephone, diplome, etablissement_precedent, formation, specialisation, urgence_nom, urgence_relation, urgence_telephone, urgence_email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->execute([$etudiant_id, $date_naissance, $lieu_naissance, $sexe, $nationalite, $adresse, $email, $telephone, $diplome, $etablissement_precedent, $formation, $specialisation, $urgence_nom, $urgence_relation, $urgence_telephone, $urgence_email]);
                $create_success = "Fiche créée avec succès !";
                // Redirige vers dashboard pour afficher les autres boutons
                header('Location: /inscription/index.php?page=student_dashboard');
                exit;
            }
        }
        require_once __DIR__ . '/views/student/create-fiche.php';
        break;
    // Ajoute d'autres routes ici
    default:
        require_once __DIR__ . '/views/home.php';
        break;
}