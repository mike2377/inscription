<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2>Ma fiche d'inscription</h2>
    <?php if ($fiche): ?>
        <table class="w3-table-all w3-card-4">
            <tr><th>Nom</th><td><?= htmlspecialchars($fiche['nom']) ?></td></tr>
            <tr><th>Prénom</th><td><?= htmlspecialchars($fiche['prenom']) ?></td></tr>
            <tr><th>Date de naissance</th><td><?= htmlspecialchars($fiche['date_naissance'] ?? '') ?></td></tr>
            <tr><th>Lieu de naissance</th><td><?= htmlspecialchars($fiche['lieu_naissance'] ?? '') ?></td></tr>
            <tr><th>Sexe</th><td><?= htmlspecialchars($fiche['sexe'] ?? '') ?></td></tr>
            <tr><th>Nationalité</th><td><?= htmlspecialchars($fiche['nationalite'] ?? '') ?></td></tr>
            <tr><th>Adresse</th><td><?= htmlspecialchars($fiche['adresse'] ?? '') ?></td></tr>
            <tr><th>Téléphone</th><td><?= htmlspecialchars($fiche['telephone'] ?? '') ?></td></tr>
            <tr><th>Formation</th><td><?= htmlspecialchars($fiche['formation'] ?? '') ?></td></tr>
            <tr><th>Spécialisation</th><td><?= htmlspecialchars($fiche['specialisation'] ?? '') ?></td></tr>
            <tr><th>Statut</th><td><?= htmlspecialchars($fiche['statut'] ?? '') ?></td></tr>
        </table>
    <?php else: ?>
        <p>Aucune fiche trouvée. <a href="../../index.php?page=student_edit_profile">Compléter votre inscription</a></p>
    <?php endif; ?>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
