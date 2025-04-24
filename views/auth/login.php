<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">

<div class="w3-card w3-margin-top w3-padding w3-light-grey w3-round-large" style="max-width:500px; margin:auto;">
    <h2 class="w3-center">Connexion</h2>
    <?php if (!empty($login_error)): ?>
        <div class="w3-panel w3-red w3-round-large w3-margin-bottom w3-center">
            <?= htmlspecialchars($login_error) ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="?page=login">
        <input type="hidden" name="action" value="login">
        
        <label>Email</label>
        <input class="w3-input w3-border w3-margin-bottom" type="email" name="email" required>
        
        <label>Mot de passe</label>
        <input class="w3-input w3-border w3-margin-bottom" type="password" name="mot_de_passe" required>
        
        <button class="w3-button w3-green w3-block">Se connecter</button>
    </form>
    <p class="w3-center w3-small w3-margin-top">
        Pas encore inscrit ? <a href="?page=register">Créer un compte</a>
    </p>
</div>

</body>
</html>
