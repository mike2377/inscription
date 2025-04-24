<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2>Détail de la fiche</h2>
    <?php if (isset($fiche) && $fiche): ?>
    <table class="w3-table w3-bordered">
        <tr><th>Nom</th><td><?= htmlspecialchars($fiche['nom']) ?></td></tr>
        <tr><th>Prénom</th><td><?= htmlspecialchars($fiche['prenom']) ?></td></tr>
        <tr><th>Adresse</th><td><?= htmlspecialchars($fiche['adresse'] ?? 'Non renseignée') ?></td></tr>
        <tr><th>Statut</th><td><?= htmlspecialchars($fiche['statut'] ?? 'Non renseigné') ?></td></tr>
        <tr>
            <th>Changer le statut</th>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="fiche_id" value="<?= htmlspecialchars($fiche['id']) ?>">
                    <select class="w3-select" name="statut">
                        <option value="en_attente" <?= ($fiche['statut'] ?? '') === 'en_attente' ? 'selected' : '' ?>>En attente</option>
                        <option value="validee" <?= ($fiche['statut'] ?? '') === 'validee' ? 'selected' : '' ?>>Validée</option>
                        <option value="refusee" <?= ($fiche['statut'] ?? '') === 'refusee' ? 'selected' : '' ?>>Refusée</option>
                    </select>
                    <button class="w3-button w3-green w3-margin-top">Mettre à jour</button>
                </form>
            </td>
        </tr>
    </table>
    <?php else: ?>
        <p>Fiche introuvable.</p>
    <?php endif; ?>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
