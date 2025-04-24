<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="w3-container w3-padding">
    <h2><?= empty($fiche) ? "Remplir ma fiche d'inscription" : "Modifier mes informations" ?></h2>
    <?php if (!empty($update_success)): ?>
        <div class="w3-panel w3-green w3-round-large w3-margin-bottom w3-center">
            <?= htmlspecialchars($update_success) ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <?php if (empty($fiche) || isset($_GET['edit_fiche'])): ?>
            <!-- Affiche tous les champs sans restriction tant que la fiche n'est pas enregistrée -->
            <label>Nom</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="nom" value="<?= htmlspecialchars($user['nom'] ?? ($fiche['nom'] ?? '')) ?>" required>
            <label>Prénom</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="prenom" value="<?= htmlspecialchars($user['prenom'] ?? ($fiche['prenom'] ?? '')) ?>" required>
            <label>Date de naissance</label>
            <input class="w3-input w3-border w3-margin-bottom" type="date" name="date_naissance" value="<?= htmlspecialchars($fiche['date_naissance'] ?? '') ?>" required>
            <label>Lieu de naissance</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="lieu_naissance" value="<?= htmlspecialchars($fiche['lieu_naissance'] ?? '') ?>" required>
            <label>Sexe</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="sexe" value="<?= htmlspecialchars($fiche['sexe'] ?? '') ?>" required>
            <label>Nationalité</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="nationalite" value="<?= htmlspecialchars($fiche['nationalite'] ?? '') ?>" required>
            <label>Adresse</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="adresse" value="<?= htmlspecialchars($fiche['adresse'] ?? '') ?>" required>
            <label>Email</label>
            <input class="w3-input w3-border w3-margin-bottom" type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? ($fiche['email'] ?? '')) ?>" required>
            <label>Téléphone</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? ($fiche['telephone'] ?? '')) ?>">
            <label>Dernier diplôme obtenu</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="diplome" value="<?= htmlspecialchars($fiche['diplome'] ?? '') ?>" required>
            <label>Établissement précédent</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="etablissement_precedent" value="<?= htmlspecialchars($fiche['etablissement_precedent'] ?? '') ?>" required>
            <label>Formation demandée</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="formation" value="<?= htmlspecialchars($fiche['formation'] ?? '') ?>" required>
            <label>Spécialisation</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="specialisation" value="<?= htmlspecialchars($fiche['specialisation'] ?? '') ?>" required>
            <!-- Contact d'urgence -->
            <h4>Contact d'urgence</h4>
            <label>Nom du contact</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_nom" value="<?= htmlspecialchars($fiche['urgence_nom'] ?? '') ?>">
            <label>Relation avec l'étudiant</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_relation" value="<?= htmlspecialchars($fiche['urgence_relation'] ?? '') ?>">
            <label>Téléphone du contact</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_telephone" value="<?= htmlspecialchars($fiche['urgence_telephone'] ?? '') ?>">
            <label>Email du contact</label>
            <input class="w3-input w3-border w3-margin-bottom" type="email" name="urgence_email" value="<?= htmlspecialchars($fiche['urgence_email'] ?? '') ?>">
        <?php else: ?>
            <!-- Version restreinte : champs non modifiables désactivés (déjà présent dans la version précédente) -->
            <label>Nom</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['nom'] ?? '') ?>" disabled>
            <label>Prénom</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['prenom'] ?? '') ?>" disabled>
            <label>Date de naissance</label>
            <input class="w3-input w3-border w3-margin-bottom" type="date" value="<?= htmlspecialchars($fiche['date_naissance'] ?? '') ?>" disabled>
            <label>Lieu de naissance</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['lieu_naissance'] ?? '') ?>" disabled>
            <label>Sexe</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['sexe'] ?? '') ?>" disabled>
            <label>Nationalité</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['nationalite'] ?? '') ?>" disabled>
            <label>Dernier diplôme obtenu</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['diplome'] ?? '') ?>" disabled>
            <label>Établissement précédent</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['etablissement_precedent'] ?? '') ?>" disabled>
            <label>Formation demandée</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['formation'] ?? '') ?>" disabled>
            <label>Spécialisation</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= htmlspecialchars($fiche['specialisation'] ?? '') ?>" disabled>
            <!-- Champs modifiables par l'étudiant -->
            <label>Adresse</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="adresse" value="<?= htmlspecialchars($fiche['adresse'] ?? '') ?>" required>
            <label>Email</label>
            <input class="w3-input w3-border w3-margin-bottom" type="email" name="email" value="<?= htmlspecialchars($fiche['email'] ?? '') ?>" required>
            <label>Téléphone</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="telephone" value="<?= htmlspecialchars($fiche['telephone'] ?? '') ?>">
            <!-- Contact d'urgence -->
            <h4>Contact d'urgence</h4>
            <label>Nom du contact</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_nom" value="<?= htmlspecialchars($fiche['urgence_nom'] ?? '') ?>">
            <label>Relation avec l'étudiant</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_relation" value="<?= htmlspecialchars($fiche['urgence_relation'] ?? '') ?>">
            <label>Téléphone du contact</label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" name="urgence_telephone" value="<?= htmlspecialchars($fiche['urgence_telephone'] ?? '') ?>">
            <label>Email du contact</label>
            <input class="w3-input w3-border w3-margin-bottom" type="email" name="urgence_email" value="<?= htmlspecialchars($fiche['urgence_email'] ?? '') ?>">
        <?php endif; ?>
        <button class="w3-button w3-green"><?= (empty($fiche) || isset($_GET['edit_fiche'])) ? "Enregistrer" : "Mettre à jour" ?></button>
    </form>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
