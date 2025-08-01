<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Système d'inscription - Cosendai</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/inscription/assets/css/main.css">
    <link rel="stylesheet" href="/inscription/assets/css/landing.css">
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Script principal de l'application -->
    <script src="/inscription/assets/js/app.js"></script>
</head>
<body style="background-color: #f5f7fa;">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1565c0;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/inscription/index.php">Université Cosendai</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'etudiant')): ?>
          <li class="nav-item"><a class="btn btn-primary" href="/inscription/controllers/AuthController.php?logout=true">Déconnexion</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/inscription/index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="/inscription/index.php#steps">Processus</a></li>
          <li class="nav-item"><a class="nav-link" href="/inscription/index.php#documents">Documents</a></li>
          <li class="nav-item"><a class="nav-link" href="/inscription/index.php#faq">FAQ</a></li>
          <li class="nav-item"><a class="btn btn-outline-primary" href="/inscription/index.php?page=login">Connexion</a></li>
          <li class="nav-item"><a class="btn btn-primary" href="/inscription/index.php?page=register">Inscription</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid p-0" style="margin-top: 76px;">
  <div class="row g-0">
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
      <?php include __DIR__.'/sidebar.php'; ?>
    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'etudiant'): ?>
      <?php include __DIR__.'/sidebar.php'; ?>
    <?php endif; ?>
    <main class="<?php echo isset($_SESSION['role']) ? 'col-md-9 ms-sm-auto col-lg-10 p-0' : 'col-12 p-0'; ?>">
