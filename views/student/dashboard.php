<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2>Tableau de bord étudiant</h2>
    <p>Bienvenue sur votre tableau de bord. Ici vous pouvez consulter et gérer votre fiche d'inscription.</p>
    <?php if (empty($fiche)): ?>
        <a href="/inscription/index.php?page=student_create_fiche" class="w3-button w3-orange w3-margin-top">Commencer mon inscription</a>
    <?php else: ?>
        <a href="/inscription/index.php?page=student_profile" class="w3-button w3-blue w3-margin-top">Voir ma fiche</a>
        <a href="/inscription/index.php?page=student_edit_profile" class="w3-button w3-green w3-margin-top">Modifier mes informations</a>
    <?php endif; ?>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
