<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<?php
// Calcul dynamique du nombre de documents déposés
if (!isset($nb_docs)) {
  $nb_docs = isset($documents) ? count($documents) : 0;
  if ($nb_docs === 0 && isset($fiche['id'])) {
    require_once __DIR__ . '/../../models/DocumentModel.php';
    $docs = get_documents_for_fiche($fiche['id']);
    $nb_docs = count($docs);
  }
}

// Calcul du pourcentage de progression
$total_etapes = 4; // Fiche + 3 types de documents
$etapes_completees = 0;
if (!empty($fiche)) $etapes_completees++;
if ($nb_docs > 0) $etapes_completees += min($nb_docs, 3);
$pourcentage = ($etapes_completees / $total_etapes) * 100;
?>
<div class="container py-5 px-4">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <!-- Header avec barre de progression -->
      <div class="card shadow-lg border-0 bg-gradient-primary text-white mb-5">
        <div class="card-body p-5 text-center">
          <div class="mb-4">
            <i class="bi bi-person-vcard display-1 text-warning"></i>
          </div>
          <h1 class="display-4 fw-bold mb-3">Mon Tableau de Bord</h1>
          <p class="lead mb-4 opacity-75">Suivez l'avancement de votre inscription à l'Université Adventiste Cosendai</p>
          
          <!-- Barre de progression -->
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="progress bg-white bg-opacity-25 mb-3" style="height: 8px;">
                <div class="progress-bar bg-warning" role="progressbar" 
                     style="width: <?= ($etapes_completees / $total_etapes) * 100 ?>%" 
                     aria-valuenow="<?= $etapes_completees ?>" 
                     aria-valuemin="0" 
                     aria-valuemax="<?= $total_etapes ?>">
                </div>
              </div>
          </div>
          <p class="mb-0"><strong><?= $etapes_completees ?>/<?= $total_etapes ?></strong> étapes complétées</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Statistiques principales -->
  <div class="row g-4 mb-5 justify-content-center">
    <div class="col-md-4">
      <div class="card text-center shadow-lg border-0 h-100 hover-lift">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-file-earmark-text display-4 text-primary"></i>
          </div>
          <h6 class="card-title text-muted text-uppercase fw-bold">État de la fiche</h6>
          <?php if (empty($fiche)): ?>
            <span class="badge bg-secondary fs-6 py-3 px-4 rounded-pill">
              <i class="bi bi-clock me-2"></i>Non commencée
            </span>
          <?php else: ?>
            <?php
              $statut = $fiche['statut'] ?? 'en_attente';
              $badge = 'secondary'; $icon = 'clock'; $label = 'En attente';
              if ($statut === 'validee') { $badge = 'success'; $icon = 'check-circle'; $label = 'Validée'; }
              elseif ($statut === 'refusee') { $badge = 'danger'; $icon = 'x-circle'; $label = 'Refusée'; }
            ?>
            <span class="badge bg-<?= $badge ?> fs-6 py-3 px-4 rounded-pill">
              <i class="bi bi-<?= $icon ?> me-2"></i><?= $label ?>
            </span>
          <?php endif; ?>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card text-center shadow-lg border-0 h-100 hover-lift">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-folder2-open display-4 text-info"></i>
          </div>
          <h6 class="card-title text-muted text-uppercase fw-bold">Documents déposés</h6>
          <div class="display-4 fw-bold text-info mb-2"><?= $nb_docs ?></div>
          <p class="text-muted mb-0">sur 4 requis</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card text-center shadow-lg border-0 h-100 hover-lift">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-calendar-check display-4 text-success"></i>
          </div>
          <h6 class="card-title text-muted text-uppercase fw-bold">Dernière activité</h6>
          <div class="fs-5 fw-bold text-success mb-2">
            <?php if (!empty($fiche)): ?>
              <?= date('d/m/Y', strtotime($fiche['date_creation'] ?? 'now')) ?>
            <?php else: ?>
              Aucune
            <?php endif; ?>
          </div>
          <p class="text-muted mb-0">Date de création</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Actions rapides -->
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card shadow-lg border-0">
        <div class="card-header bg-light border-0 py-4">
          <h4 class="mb-0 text-center">
            <i class="bi bi-lightning-charge text-warning me-2"></i>Actions rapides
          </h4>
        </div>
        <div class="card-body p-5 text-center">
          <?php if (empty($fiche)): ?>
            <div class="mb-4">
              <i class="bi bi-emoji-smile display-1 text-warning mb-3"></i>
              <h5 class="text-muted">Commencez votre inscription !</h5>
              <p class="text-muted">Créez votre fiche d'inscription pour commencer votre parcours universitaire.</p>
            </div>
            <a href="/inscription/index.php?page=student_create_fiche" class="btn btn-warning btn-lg px-5 py-3 me-3 mb-2">
              <i class="bi bi-plus-circle me-2"></i>Commencer mon inscription
            </a>
          <?php else: ?>
            <div class="row g-3 justify-content-center">
              <div class="col-md-4">
                <a href="/inscription/index.php?page=student_profile" class="btn btn-primary btn-lg w-100 py-3 mb-2">
                  <i class="bi bi-person-vcard me-2"></i>Voir ma fiche
                </a>
              </div>
              <div class="col-md-4">
                <a href="/inscription/index.php?page=student_edit_profile" class="btn btn-success btn-lg w-100 py-3 mb-2">
                  <i class="bi bi-pencil-square me-2"></i>Modifier mes infos
                </a>
              </div>
              <div class="col-md-4">
                <a href="/inscription/index.php?page=student_upload_documents" class="btn btn-outline-primary btn-lg w-100 py-3 mb-2">
                  <i class="bi bi-upload me-2"></i>Déposer mes documents
                </a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Timeline ou prochaines étapes -->
  <div class="row">
    <div class="col-lg-10 mx-auto">
      <div class="card shadow-lg border-0">
        <div class="card-header bg-light border-0 py-4">
          <h4 class="mb-0 text-center">
            <i class="bi bi-list-check text-primary me-2"></i>Prochaines étapes
          </h4>
        </div>
        <div class="card-body p-5">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="d-flex align-items-center p-3 rounded-3 <?= !empty($fiche) ? 'bg-success bg-opacity-10' : 'bg-light' ?>">
                <div class="me-3">
                  <i class="bi bi-<?= !empty($fiche) ? 'check-circle-fill text-success' : 'circle text-muted' ?> fs-4"></i>
                </div>
                <div>
                  <h6 class="mb-1 fw-bold">Créer ma fiche</h6>
                  <p class="mb-0 text-muted small">Compléter les informations personnelles</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center p-3 rounded-3 <?= $nb_docs >= 1 ? 'bg-success bg-opacity-10' : 'bg-light' ?>">
                <div class="me-3">
                  <i class="bi bi-<?= $nb_docs >= 1 ? 'check-circle-fill text-success' : 'circle text-muted' ?> fs-4"></i>
                </div>
                <div>
                  <h6 class="mb-1 fw-bold">Pièce d'identité</h6>
                  <p class="mb-0 text-muted small">Déposer votre pièce d'identité</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center p-3 rounded-3 <?= $nb_docs >= 2 ? 'bg-success bg-opacity-10' : 'bg-light' ?>">
                <div class="me-3">
                  <i class="bi bi-<?= $nb_docs >= 2 ? 'check-circle-fill text-success' : 'circle text-muted' ?> fs-4"></i>
                </div>
                <div>
                  <h6 class="mb-1 fw-bold">Diplômes</h6>
                  <p class="mb-0 text-muted small">Déposer vos diplômes</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center p-3 rounded-3 <?= $nb_docs >= 3 ? 'bg-success bg-opacity-10' : 'bg-light' ?>">
                <div class="me-3">
                  <i class="bi bi-<?= $nb_docs >= 3 ? 'check-circle-fill text-success' : 'circle text-muted' ?> fs-4"></i>
                </div>
                <div>
                  <h6 class="mb-1 fw-bold">Documents complémentaires</h6>
                  <p class="mb-0 text-muted small">Photo et justificatif de domicile</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Inclusion des fichiers CSS et JS -->
<link rel="stylesheet" href="/inscription/assets/css/student.css">
<script src="/inscription/assets/js/student.js"></script>

<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
