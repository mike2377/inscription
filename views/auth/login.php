<?php
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
// Empêcher l'inclusion du header/footer pour cette page
$is_auth_page = true;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - Université Cosendai</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/inscription/assets/css/auth.css">
</head>
<body class="auth-bg">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-4 shadow-lg rounded-4 auth-card bg-white" style="max-width:420px; width:100%;">
            <div class="text-center mb-4">
                <img src="/inscription/assets/images/logo.jpg   " alt="Logo UAC" width="70" height="70" class="bg-white rounded-circle shadow-sm p-2 mb-3">
                <h3 class="text-primary fw-bold">Université Cosendai</h3>
                <p class="text-muted">Connectez-vous à votre espace</p>
            </div>
            
            <?php if (!empty($login_error)): ?>
                <div class="alert alert-danger text-center py-2 rounded-3 mb-3">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <?= htmlspecialchars($login_error) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="?page=login">
                <input type="hidden" name="action" value="login">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="bi bi-envelope text-primary"></i>
                        </span>
                        <input class="form-control border-start-0" type="email" name="email" required placeholder="Votre adresse email">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="bi bi-lock text-primary"></i>
                        </span>
                        <input class="form-control border-start-0" type="password" name="mot_de_passe" required placeholder="Votre mot de passe">
                    </div>
                </div>
                <button class="btn btn-primary w-100 mb-3 py-2" type="submit">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
                </button>
                <a href="/inscription/index.php" class="btn btn-outline-secondary w-100 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Retour à l'accueil
                </a>
            </form>
            
            <div class="text-center mt-4 pt-3 border-top">
                <p class="text-muted mb-0">
                    Pas encore inscrit ? 
                    <a href="?page=register" class="text-primary fw-semibold text-decoration-none">Créer un compte</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
