<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body">
          <h2 class="mb-4 text-center"><?= empty($fiche) ? "Remplir ma fiche d'inscription" : "Modifier mes informations" ?></h2>
          <?php if (!empty($update_success)): ?>
            <div class="alert alert-success text-center mb-4">
              <i class="bi bi-check-circle me-2"></i><?= htmlspecialchars($update_success) ?>
            </div>
          <?php endif; ?>
          <form action="" method="POST">
            <h5 class="mb-3 mt-2 text-primary"><i class="bi bi-person me-2"></i>Informations personnelles</h5>
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label class="form-label">Nom</label>
                <input class="form-control rounded-3" type="text" name="nom" value="<?= htmlspecialchars($user['nom'] ?? ($fiche['nom'] ?? '')) ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-6">
                <label class="form-label">Prénom</label>
                <input class="form-control rounded-3" type="text" name="prenom" value="<?= htmlspecialchars($user['prenom'] ?? ($fiche['prenom'] ?? '')) ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-6">
                <label class="form-label">Date de naissance</label>
                <input class="form-control rounded-3" type="date" name="date_naissance" value="<?= htmlspecialchars($fiche['date_naissance'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-6">
                <label class="form-label">Lieu de naissance</label>
                <input class="form-control rounded-3" type="text" name="lieu_naissance" value="<?= htmlspecialchars($fiche['lieu_naissance'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-4">
                <label class="form-label">Sexe</label>
                <input class="form-control rounded-3" type="text" name="sexe" value="<?= htmlspecialchars($fiche['sexe'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-4">
                <label class="form-label">Nationalité</label>
                <input class="form-control rounded-3" type="text" name="nationalite" value="<?= htmlspecialchars($fiche['nationalite'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-4">
                <label class="form-label">Adresse</label>
                <input class="form-control rounded-3" type="text" name="adresse" value="<?= htmlspecialchars($fiche['adresse'] ?? '') ?>" required >
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input class="form-control rounded-3" type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? ($fiche['email'] ?? '')) ?>" required >
              </div>
              <div class="col-md-6">
                <label class="form-label">Téléphone</label>
                <input class="form-control rounded-3" type="text" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? ($fiche['telephone'] ?? '')) ?>">
              </div>
            </div>
            <h5 class="mb-3 mt-4 text-primary"><i class="bi bi-mortarboard me-2"></i>Formation</h5>
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label class="form-label">Dernier diplôme obtenu</label>
                <input class="form-control rounded-3" type="text" name="diplome" value="<?= htmlspecialchars($fiche['diplome'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-6">
                <label class="form-label">Établissement précédent</label>
                <input class="form-control rounded-3" type="text" name="etablissement_precedent" value="<?= htmlspecialchars($fiche['etablissement_precedent'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-6">
                <label class="form-label">Formation demandée</label>
                <input class="form-control rounded-3" type="text" name="formation" value="<?= htmlspecialchars($fiche['formation'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
              <div class="col-md-6">
                <label class="form-label">Spécialisation</label>
                <input class="form-control rounded-3" type="text" name="specialisation" value="<?= htmlspecialchars($fiche['specialisation'] ?? '') ?>" required <?= (!empty($fiche) && !isset($_GET['edit_fiche'])) ? 'disabled' : '' ?> >
              </div>
            </div>
            <h5 class="mb-3 mt-4 text-primary"><i class="bi bi-person-lines-fill me-2"></i>Contact d'urgence</h5>
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label class="form-label">Nom du contact</label>
                <input class="form-control rounded-3" type="text" name="urgence_nom" value="<?= htmlspecialchars($fiche['urgence_nom'] ?? '') ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label">Relation</label>
                <input class="form-control rounded-3" type="text" name="urgence_relation" value="<?= htmlspecialchars($fiche['urgence_relation'] ?? '') ?>">
              </div>
              <div class="col-md-3">
                <label class="form-label">Téléphone</label>
                <input class="form-control rounded-3" type="text" name="urgence_telephone" value="<?= htmlspecialchars($fiche['urgence_telephone'] ?? '') ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input class="form-control rounded-3" type="email" name="urgence_email" value="<?= htmlspecialchars($fiche['urgence_email'] ?? '') ?>">
              </div>
            </div>
            <div class="text-center mt-4">
              <button class="btn btn-success btn-lg px-4" type="submit">
                <i class="bi bi-check-circle me-2"></i><?= (empty($fiche) || isset($_GET['edit_fiche'])) ? "Enregistrer" : "Mettre à jour" ?>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
