<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2>Détail de la fiche</h2>
    <?php if (isset($fiche) && $fiche): ?>
    <form action="" method="POST">
    <table class="w3-table w3-bordered">
        <tr><th>Nom</th><td><input class="w3-input" type="text" name="nom" value="<?= htmlspecialchars($fiche['nom']) ?>"></td></tr>
        <tr><th>Prénom</th><td><input class="w3-input" type="text" name="prenom" value="<?= htmlspecialchars($fiche['prenom']) ?>"></td></tr>
        <tr><th>Date de naissance</th><td><input class="w3-input" type="date" name="date_naissance" value="<?= htmlspecialchars($fiche['date_naissance']) ?>"></td></tr>
        <tr><th>Lieu de naissance</th><td><input class="w3-input" type="text" name="lieu_naissance" value="<?= htmlspecialchars($fiche['lieu_naissance']) ?>"></td></tr>
        <tr><th>Sexe</th><td><input class="w3-input" type="text" name="sexe" value="<?= htmlspecialchars($fiche['sexe']) ?>"></td></tr>
        <tr><th>Nationalité</th><td><input class="w3-input" type="text" name="nationalite" value="<?= htmlspecialchars($fiche['nationalite']) ?>"></td></tr>
        <tr><th>Adresse</th><td><input class="w3-input" type="text" name="adresse" value="<?= htmlspecialchars($fiche['adresse']) ?>"></td></tr>
        <tr><th>Email</th><td><input class="w3-input" type="email" name="email" value="<?= htmlspecialchars($fiche['email']) ?>"></td></tr>
        <tr><th>Téléphone</th><td><input class="w3-input" type="text" name="telephone" value="<?= htmlspecialchars($fiche['telephone']) ?>"></td></tr>
        <tr><th>Diplôme</th><td><input class="w3-input" type="text" name="diplome" value="<?= htmlspecialchars($fiche['diplome']) ?>"></td></tr>
        <tr><th>Établissement précédent</th><td><input class="w3-input" type="text" name="etablissement_precedent" value="<?= htmlspecialchars($fiche['etablissement_precedent']) ?>"></td></tr>
        <tr><th>Formation demandée</th><td><input class="w3-input" type="text" name="formation" value="<?= htmlspecialchars($fiche['formation']) ?>"></td></tr>
        <tr><th>Spécialisation</th><td><input class="w3-input" type="text" name="specialisation" value="<?= htmlspecialchars($fiche['specialisation']) ?>"></td></tr>
        <tr><th>Contact d'urgence (Nom)</th><td><input class="w3-input" type="text" name="urgence_nom" value="<?= htmlspecialchars($fiche['urgence_nom']) ?>"></td></tr>
        <tr><th>Contact d'urgence (Relation)</th><td><input class="w3-input" type="text" name="urgence_relation" value="<?= htmlspecialchars($fiche['urgence_relation']) ?>"></td></tr>
        <tr><th>Contact d'urgence (Téléphone)</th><td><input class="w3-input" type="text" name="urgence_telephone" value="<?= htmlspecialchars($fiche['urgence_telephone']) ?>"></td></tr>
        <tr><th>Contact d'urgence (Email)</th><td><input class="w3-input" type="email" name="urgence_email" value="<?= htmlspecialchars($fiche['urgence_email']) ?>"></td></tr>
        <tr><th>Statut</th><td><?= htmlspecialchars($fiche['statut'] ?? 'Non renseigné') ?></td></tr>
        <tr><th>Commentaires</th><td><textarea class="w3-input" name="commentaires"><?= htmlspecialchars($fiche['commentaires'] ?? '') ?></textarea></td></tr>
        <tr>
            <th>Changer le statut</th>
            <td>
                <input type="hidden" name="fiche_id" value="<?= htmlspecialchars($fiche['id']) ?>">
                <select class="w3-select" name="statut">
                    <option value="en_attente" <?= ($fiche['statut'] ?? '') === 'en_attente' ? 'selected' : '' ?>>En attente</option>
                    <option value="validee" <?= ($fiche['statut'] ?? '') === 'validee' ? 'selected' : '' ?>>Validée</option>
                    <option value="refusee" <?= ($fiche['statut'] ?? '') === 'refusee' ? 'selected' : '' ?>>Refusée</option>
                </select>
                <button class="w3-button w3-green w3-margin-top">Mettre à jour</button>
            </td>
        </tr>
    </table>
    </form>
    <h3>Documents déposés</h3>
    <?php if (!empty($documents)): ?>
        <ul>
            <?php foreach ($documents as $doc): ?>
                <li>
                    <?= htmlspecialchars($doc['type_document']) ?> :
                    <a href="/inscription/<?= htmlspecialchars($doc['chemin']) ?>" target="_blank">Voir le document</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun document déposé.</p>
    <?php endif; ?>
    <?php else: ?>
        <p>Fiche introuvable.</p>
    <?php endif; ?>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
