<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">

<div class="w3-card w3-margin-top w3-padding w3-light-grey w3-round-large" style="max-width:600px; margin:auto;">
    <h2 class="w3-center">Inscription Étudiant</h2>
    <?php if (!empty($register_error)): ?>
        <div class="w3-panel w3-red w3-round-large w3-margin-bottom w3-center">
            <?= htmlspecialchars($register_error) ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($register_success)): ?>
        <div class="w3-panel w3-green w3-round-large w3-margin-bottom w3-center">
            <?= htmlspecialchars($register_success) ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="?page=register">
        <input type="hidden" name="action" value="register">

        <label>Email</label>
        <input class="w3-input w3-border" type="email" name="email" required>

        <label>Téléphone</label>
        <input class="w3-input w3-border" type="text" name="telephone" required>

        <label>Mot de passe</label>
        <input class="w3-input w3-border" type="password" name="mot_de_passe" required>

        <button class="w3-button w3-green w3-block w3-margin-top">S'inscrire</button>
    </form>
    <p class="w3-center w3-small w3-margin-top">
        Déjà inscrit ? <a href="?page=login">Connexion</a>
    </p>
</div>

</body>
</html>
