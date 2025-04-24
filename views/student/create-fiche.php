<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2>Commencer mon inscription</h2>
    <?php if (!empty($create_success)): ?>
        <div class="w3-panel w3-green w3-round-large w3-margin-bottom w3-center">
            <?= htmlspecialchars($create_success) ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <label>Nom</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="nom" value="<?= htmlspecialchars($user['nom'] ?? '') ?>" required>
        <label>Prénom</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="prenom" value="<?= htmlspecialchars($user['prenom'] ?? '') ?>" required>
        <label>Date de naissance</label>
        <input class="w3-input w3-border w3-margin-bottom" type="date" name="date_naissance" required>
        <label>Lieu de naissance</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="lieu_naissance" required>
        <label>Sexe</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="sexe" required>
        <label>Nationalité</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="nationalite" required>
        <label>Adresse</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="adresse" required>
        <label>Email</label>
        <input class="w3-input w3-border w3-margin-bottom" type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
        <label>Téléphone</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? '') ?>">
        <label>Dernier diplôme obtenu</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="diplome" required>
        <label>Établissement précédent</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="etablissement_precedent" required>
        <label>Formation demandée</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="formation" required>
        <label>Spécialisation</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="specialisation" required>
        <h4>Contact d'urgence</h4>
        <label>Nom du contact</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_nom">
        <label>Relation avec l'étudiant</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_relation">
        <label>Téléphone du contact</label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_telephone">
        <label>Email du contact</label>
        <input class="w3-input w3-border w3-margin-bottom" type="email" name="urgence_email">
        <button class="w3-button w3-green">Enregistrer</button>
    </form>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
