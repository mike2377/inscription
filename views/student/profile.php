<?php 
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
include_once(__DIR__ . '/../layouts/header.php'); ?>

<div class="container py-5 px-4">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <!-- Header de la page -->
      <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary mb-3">
          <i class="bi bi-person-vcard me-3"></i>Ma fiche d'inscription
        </h1>
        <p class="lead text-muted">Consultez les détails de votre fiche d'inscription</p>
      </div>

      <?php if ($fiche): ?>
        <!-- Informations personnelles -->
        <div class="card shadow-lg border-0 mb-4">
          <div class="card-header bg-primary text-white py-4">
            <h4 class="mb-0"><i class="bi bi-person me-2"></i>Informations personnelles</h4>
          </div>
          <div class="card-body p-4">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-person text-primary fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Nom</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['nom']) ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-person text-primary fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Prénom</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['prenom']) ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-calendar text-info fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Date de naissance</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['date_naissance'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-geo-alt text-info fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Lieu de naissance</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['lieu_naissance'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-gender-ambiguous text-warning fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Sexe</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['sexe'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-flag text-warning fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Nationalité</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['nationalite'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Coordonnées -->
        <div class="card shadow-lg border-0 mb-4">
          <div class="card-header bg-info text-white py-4">
            <h4 class="mb-0"><i class="bi bi-geo-alt me-2"></i>Coordonnées</h4>
          </div>
          <div class="card-body p-4">
            <div class="row g-4">
              <div class="col-12">
                <div class="d-flex align-items-start p-3 rounded-3 bg-light">
                  <i class="bi bi-house text-info fs-4 me-3 mt-1"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Adresse</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['adresse'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-envelope text-info fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Email</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['email'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-telephone text-info fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Téléphone</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['telephone'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Formation -->
        <div class="card shadow-lg border-0 mb-4">
          <div class="card-header bg-success text-white py-4">
            <h4 class="mb-0"><i class="bi bi-mortarboard me-2"></i>Formation</h4>
          </div>
          <div class="card-body p-4">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-award text-success fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Formation demandée</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['formation'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-book text-success fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Spécialisation</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['specialisation'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-mortarboard text-success fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Dernier diplôme</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['diplome'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-building text-success fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Établissement précédent</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['etablissement_precedent'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact d'urgence -->
        <?php if (!empty($fiche['urgence_nom']) || !empty($fiche['urgence_telephone'])): ?>
        <div class="card shadow-lg border-0 mb-4">
          <div class="card-header bg-warning text-dark py-4">
            <h4 class="mb-0"><i class="bi bi-telephone me-2"></i>Contact d'urgence</h4>
          </div>
          <div class="card-body p-4">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-person text-warning fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Nom du contact</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['urgence_nom'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-people text-warning fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Relation</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['urgence_relation'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-telephone text-warning fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Téléphone</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['urgence_telephone'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                  <i class="bi bi-envelope text-warning fs-4 me-3"></i>
                  <div>
                    <small class="text-muted text-uppercase fw-bold">Email</small>
                    <div class="fw-semibold"><?= htmlspecialchars($fiche['urgence_email'] ?? 'Non renseigné') ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <!-- Statut de la fiche -->
        <div class="card shadow-lg border-0 mb-4">
          <div class="card-header bg-secondary text-white py-4">
            <h4 class="mb-0"><i class="bi bi-info-circle me-2"></i>Statut de la fiche</h4>
          </div>
          <div class="card-body p-4 text-center">
            <?php
              $statut = $fiche['statut'] ?? 'en_attente';
              $badge = 'secondary'; $icon = 'clock'; $label = 'En attente';
              if ($statut === 'validee') { $badge = 'success'; $icon = 'check-circle'; $label = 'Validée'; }
              elseif ($statut === 'refusee') { $badge = 'danger'; $icon = 'x-circle'; $label = 'Refusée'; }
            ?>
            <div class="display-6 fw-bold text-<?= $badge ?> mb-3">
              <i class="bi bi-<?= $icon ?> me-3"></i><?= $label ?>
            </div>
            <p class="text-muted mb-0">
              <?php if ($statut === 'en_attente'): ?>
                Votre fiche est en cours d'examen par l'administration.
              <?php elseif ($statut === 'validee'): ?>
                Félicitations ! Votre fiche a été validée par l'administration.
              <?php elseif ($statut === 'refusee'): ?>
                Votre fiche a été refusée. Veuillez contacter l'administration pour plus d'informations.
              <?php endif; ?>
            </p>
          </div>
        </div>

        <!-- Actions -->
        <div class="text-center">
          <a href="/inscription/index.php?page=student_edit_profile" class="btn btn-primary btn-lg px-5 me-3">
            <i class="bi bi-pencil-square me-2"></i>Modifier ma fiche
          </a>
          <a href="/inscription/index.php?page=student_dashboard" class="btn btn-outline-secondary btn-lg">
            <i class="bi bi-arrow-left me-2"></i>Retour au tableau de bord
          </a>
        </div>

      <?php else: ?>
        <!-- Aucune fiche trouvée -->
        <div class="card shadow-lg border-0">
          <div class="card-body p-5 text-center">
            <div class="mb-4">
              <i class="bi bi-exclamation-triangle display-1 text-warning"></i>
            </div>
            <h3 class="text-warning mb-3">Aucune fiche trouvée</h3>
            <p class="lead text-muted mb-4">Vous n'avez pas encore créé votre fiche d'inscription.</p>
            <a href="/inscription/index.php?page=student_create_fiche" class="btn btn-warning btn-lg px-5 me-3">
              <i class="bi bi-plus-circle me-2"></i>Créer ma fiche
            </a>
            <a href="/inscription/index.php?page=student_dashboard" class="btn btn-outline-secondary btn-lg">
              <i class="bi bi-arrow-left me-2"></i>Retour au tableau de bord
            </a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
