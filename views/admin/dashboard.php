<?php include_once(__DIR__ . '/../layouts/header.php'); ?>
<?php 
require_once __DIR__ . '/../../models/RegistrationModel.php';
$nb_etudiants = count_total_students();
$nb_attente = count_fiches_by_statut('en_attente');
$nb_validees = count_fiches_by_statut('validee');
$nb_refusees = count_fiches_by_statut('refusee');
?>
<div class="container py-5 px-4">
  <!-- Header avec animation -->
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card shadow-lg border-0 bg-gradient-primary text-white text-center p-5">
        <div class="card-body">
          <div class="mb-4">
            <i class="bi bi-shield-check display-1 text-warning"></i>
          </div>
          <h1 class="display-4 fw-bold mb-3">Tableau de bord Administrateur</h1>
          <p class="lead mb-4 opacity-75">Gérez toutes les fiches d'inscription des étudiants depuis votre espace administrateur.</p>
          
          <!-- Statistiques globales -->
          <div class="row g-4">
            <div class="col-md-3">
              <div class="text-center">
                <div class="display-4 fw-bold mb-2"><?= $nb_etudiants ?></div>
                <p class="mb-0 opacity-75">Total étudiants</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <div class="display-4 fw-bold mb-2"><?= $nb_attente ?></div>
                <p class="mb-0 opacity-75">En attente</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <div class="display-4 fw-bold mb-2"><?= $nb_validees ?></div>
                <p class="mb-0 opacity-75">Validées</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <div class="display-4 fw-bold mb-2"><?= $nb_refusees ?></div>
                <p class="mb-0 opacity-75">Refusées</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Statistiques détaillées -->
  <div class="row g-4 mb-5">
    <div class="col-md-3">
      <div class="card text-center shadow-lg border-0 h-100 hover-lift">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-people display-4 text-primary"></i>
          </div>
          <h6 class="card-title text-muted text-uppercase fw-bold">Total étudiants</h6>
          <div class="display-4 fw-bold text-primary mb-2"><?= $nb_etudiants ?></div>
          <p class="text-muted mb-0">Inscriptions reçues</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="card text-center shadow-lg border-0 h-100 hover-lift">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-clock display-4 text-warning"></i>
          </div>
          <h6 class="card-title text-muted text-uppercase fw-bold">En attente</h6>
          <div class="display-4 fw-bold text-warning mb-2"><?= $nb_attente ?></div>
          <p class="text-muted mb-0">En cours de traitement</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="card text-center shadow-lg border-0 h-100 hover-lift">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-check-circle display-4 text-success"></i>
          </div>
          <h6 class="card-title text-muted text-uppercase fw-bold">Validées</h6>
          <div class="display-4 fw-bold text-success mb-2"><?= $nb_validees ?></div>
          <p class="text-muted mb-0">Inscriptions acceptées</p>
        </div>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="card text-center shadow-lg border-0 h-100 hover-lift">
        <div class="card-body p-4">
          <div class="mb-3">
            <i class="bi bi-x-circle display-4 text-danger"></i>
          </div>
          <h6 class="card-title text-muted text-uppercase fw-bold">Fiches refusées</h6>
          <div class="display-4 fw-bold text-danger mb-2"><?= $nb_refusees ?></div>
          <p class="text-muted mb-0">Inscriptions rejetées</p>
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
          <div class="row g-4 justify-content-center">
            <div class="col-md-4">
              <a href="/inscription/index.php?page=admin_students" class="btn btn-primary btn-lg w-100 py-3 mb-2">
                <i class="bi bi-people me-2"></i>Voir la liste des étudiants
              </a>
            </div>
            <div class="col-md-4">
              <a href="#" class="btn btn-success btn-lg w-100 py-3 mb-2">
                <i class="bi bi-download me-2"></i>Exporter les données
              </a>
            </div>
            <div class="col-md-4">
              <a href="#" class="btn btn-info btn-lg w-100 py-3 mb-2">
                <i class="bi bi-graph-up me-2"></i>Voir les statistiques
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Graphique et répartition -->
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card shadow-lg border-0 h-100">
        <div class="card-header bg-light border-0 py-4">
          <h5 class="mb-0">
            <i class="bi bi-pie-chart text-primary me-2"></i>Répartition des statuts
          </h5>
        </div>
        <div class="card-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-warning bg-opacity-10">
                <div class="d-flex align-items-center">
                  <i class="bi bi-clock text-warning fs-4 me-3"></i>
                  <div>
                    <h6 class="mb-1 fw-bold">En attente</h6>
                    <p class="mb-0 text-muted small">En cours de traitement</p>
                  </div>
                </div>
                <div class="text-end">
                  <div class="fw-bold text-warning"><?= $nb_attente ?></div>
                  <small class="text-muted">étudiants</small>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-success bg-opacity-10">
                <div class="d-flex align-items-center">
                  <i class="bi bi-check-circle text-success fs-4 me-3"></i>
                  <div>
                    <h6 class="mb-1 fw-bold">Validées</h6>
                    <p class="mb-0 text-muted small">Inscriptions acceptées</p>
                  </div>
                </div>
                <div class="text-end">
                  <div class="fw-bold text-success"><?= $nb_validees ?></div>
                  <small class="text-muted">étudiants</small>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-danger bg-opacity-10">
                <div class="d-flex align-items-center">
                  <i class="bi bi-x-circle text-danger fs-4 me-3"></i>
                  <div>
                    <h6 class="mb-1 fw-bold">Refusées</h6>
                    <p class="mb-0 text-muted small">Inscriptions rejetées</p>
                  </div>
                </div>
                <div class="text-end">
                  <div class="fw-bold text-danger"><?= $nb_refusees ?></div>
                  <small class="text-muted">étudiants</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-6">
      <div class="card shadow-lg border-0 h-100">
        <div class="card-header bg-light border-0 py-4">
          <h5 class="mb-0">
            <i class="bi bi-activity text-success me-2"></i>Activité récente
          </h5>
        </div>
        <div class="card-body p-4">
          <div class="row g-3">
            <div class="col-12">
              <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                <div class="me-3">
                  <i class="bi bi-person-plus text-primary fs-4"></i>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1 fw-bold">Nouvelle inscription</h6>
                  <p class="mb-0 text-muted small">Un étudiant vient de s'inscrire</p>
                </div>
                <small class="text-muted">Il y a 2h</small>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                <div class="me-3">
                  <i class="bi bi-check-circle text-success fs-4"></i>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1 fw-bold">Fiche validée</h6>
                  <p class="mb-0 text-muted small">Une fiche a été validée</p>
                </div>
                <small class="text-muted">Il y a 4h</small>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex align-items-center p-3 rounded-3 bg-light">
                <div class="me-3">
                  <i class="bi bi-upload text-info fs-4"></i>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-1 fw-bold">Documents déposés</h6>
                  <p class="mb-0 text-muted small">Un étudiant a déposé ses documents</p>
                </div>
                <small class="text-muted">Il y a 6h</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Inclusion des fichiers CSS et JS -->
<link rel="stylesheet" href="/inscription/assets/css/admin.css">
<script src="/inscription/assets/js/admin.js"></script>

<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
