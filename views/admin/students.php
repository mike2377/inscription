<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2>Liste des étudiants inscrits</h2>
    <table class="w3-table-all w3-card-4">
        <tr class="w3-light-grey">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Action</th>
        </tr>
        <?php foreach ($fiches as $fiche): ?>
            <tr>
                <td><?= htmlspecialchars($fiche['nom']) ?></td>
                <td><?= htmlspecialchars($fiche['prenom']) ?></td>
                <td><?= htmlspecialchars($fiche['email']) ?></td>
                <td><?= htmlspecialchars($fiche['statut'] ?? 'Non renseigné') ?></td>
                <td><a class="w3-button w3-small w3-green" href="/inscription/index.php?page=admin_edit_student&id=<?= $fiche['id'] ?>">Voir</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
