<!DOCTYPE html>
<html>
<head>
    <title>Système d'inscription - Cosendai</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; }
        .w3-sidebar { width: 250px; background: #2e7d32; }
        .w3-sidebar a { color: white; }
        .w3-topbar { background: #4CAF50; }
    </style>
</head>
<body>

<!-- Top bar -->
<div class="w3-top w3-bar w3-topbar w3-large w3-text-white">
    <span class="w3-bar-item">🎓 Cosendai Inscriptions</span>
    <a href="../../index.php" class="w3-bar-item w3-button w3-right">Accueil</a>
    <a href="/inscription/controllers/AuthController.php?logout=true" class="w3-bar-item w3-button w3-right">Déconnexion</a>
</div>

<!-- Sidebar -->
<?php if (isset($_SESSION['role'])): ?>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card-4 w3-animate-left" id="mySidebar">
    <h3 class="w3-bar-item">Menu</h3>
    <?php if ($_SESSION['role'] === 'etudiant'): ?>
        <a href="/inscription/index.php?page=student_dashboard" class="w3-bar-item w3-button">🏠 Tableau de bord</a>
        <?php if (!empty($fiche)): ?>
            <a href="/inscription/index.php?page=student_profile" class="w3-bar-item w3-button">👤 Ma fiche</a>
            <a href="/inscription/index.php?page=student_edit_profile" class="w3-bar-item w3-button">✏️ Modifier mes infos</a>
        <?php endif; ?>
        <a href="/inscription/index.php?page=student_upload_documents" class="w3-bar-item w3-button">📄 Mes documents</a>
    <?php elseif ($_SESSION['role'] === 'admin'): ?>
        <a href="/inscription/index.php?page=admin_dashboard" class="w3-bar-item w3-button">🏠 Dashboard</a>
        <a href="/inscription/index.php?page=admin_students" class="w3-bar-item w3-button">👥 Fiches étudiants</a>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Page Content -->
<div class="w3-main" style="margin-left:260px; margin-top:50px;">
