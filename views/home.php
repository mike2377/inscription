<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Application d'inscription</title>
    <!-- Exemple de lien vers un fichier CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur l'application d'inscription</h1>
    </header>
    <main>
        <p>Ceci est la page d'accueil. Utilisez le menu pour naviguer.</p>
        <nav>
            <ul>
                <li><a href="/index.php?page=home">Accueil</a></li>
                <li><a href="?page=login">Se connecter</a></li>
                <!-- Ajoutez d'autres liens ici -->
            </ul>
        </nav>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Mon Application</p>
    </footer>
    <!-- Exemple de lien vers un fichier JS -->
    <script src="/assets/js/app.js"></script>
</body>
</html>