<?php include_once(__DIR__ . '/../layouts/header.php'); ?>

<div class="container py-5 px-4">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <!-- Header de la page -->
      <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary mb-3">
          <i class="bi bi-upload me-3"></i>Déposer mes documents
        </h1>
        <p class="lead text-muted">Téléchargez tous les documents requis pour finaliser votre inscription</p>
      </div>

      <?php if (empty($fiche)): ?>
        <!-- Message si pas de fiche -->
        <div class="card shadow-lg border-0 text-center">
          <div class="card-body p-5">
            <i class="bi bi-exclamation-triangle display-1 text-warning mb-4"></i>
            <h4 class="text-warning mb-3">Fiche d'inscription requise</h4>
            <p class="text-muted mb-4">Vous devez d'abord créer votre fiche d'inscription avant de pouvoir déposer des documents.</p>
            <a href="/inscription/index.php?page=student_create_fiche" class="btn btn-warning btn-lg">
              <i class="bi bi-plus-circle me-2"></i>Créer ma fiche d'inscription
            </a>
          </div>
        </div>
      <?php else: ?>
        <!-- Formulaire de dépôt -->
        <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="row g-4">
            <!-- Pièce d'identité -->
            <div class="col-lg-3 col-md-6">
              <div class="card shadow-lg border-0 h-100 upload-card">
                <div class="card-header bg-primary text-white py-3">
                  <h6 class="mb-0">
                    <i class="bi bi-card-heading me-2"></i>Pièce d'identité
                  </h6>
                </div>
                <div class="card-body p-3">
                  <div class="upload-zone" data-field="piece_identite">
                    <div class="text-center p-3">
                      <i class="bi bi-cloud-upload fs-1 text-primary mb-2"></i>
                      <h6 class="fw-bold small">Déposez votre pièce</h6>
                      <p class="text-muted small mb-2">CNI, passeport, etc.</p>
                      <input type="file" name="piece_identite" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png" required>
                      <div class="invalid-feedback">Veuillez sélectionner un fichier.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Diplômes -->
            <div class="col-lg-3 col-md-6">
              <div class="card shadow-lg border-0 h-100 upload-card">
                <div class="card-header bg-success text-white py-3">
                  <h6 class="mb-0">
                    <i class="bi bi-mortarboard me-2"></i>Diplômes
                  </h6>
                </div>
                <div class="card-body p-3">
                  <div class="upload-zone" data-field="diplomes">
                    <div class="text-center p-3">
                      <i class="bi bi-cloud-upload fs-1 text-success mb-2"></i>
                      <h6 class="fw-bold small">Déposez vos diplômes</h6>
                      <p class="text-muted small mb-2">Bac, Licence, Master...</p>
                      <input type="file" name="diplomes" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png" required>
                      <div class="invalid-feedback">Veuillez sélectionner un fichier.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Photo d'identité -->
            <div class="col-lg-3 col-md-6">
              <div class="card shadow-lg border-0 h-100 upload-card">
                <div class="card-header bg-info text-white py-3">
                  <h6 class="mb-0">
                    <i class="bi bi-camera me-2"></i>Photo d'identité
                  </h6>
                </div>
                <div class="card-body p-3">
                  <div class="upload-zone" data-field="photo_identite">
                    <div class="text-center p-3">
                      <i class="bi bi-cloud-upload fs-1 text-info mb-2"></i>
                      <h6 class="fw-bold small">Déposez votre photo</h6>
                      <p class="text-muted small mb-2">Photo d'identité récente</p>
                      <input type="file" name="photo_identite" class="form-control form-control-sm" accept=".jpg,.jpeg,.png" required>
                      <div class="invalid-feedback">Veuillez sélectionner un fichier.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Justificatif de domicile -->
            <div class="col-lg-3 col-md-6">
              <div class="card shadow-lg border-0 h-100 upload-card">
                <div class="card-header bg-warning text-dark py-3">
                  <h6 class="mb-0">
                    <i class="bi bi-house me-2"></i>Justificatif de domicile
                  </h6>
                </div>
                <div class="card-body p-3">
                  <div class="upload-zone" data-field="justificatif_domicile">
                    <div class="text-center p-3">
                      <i class="bi bi-cloud-upload fs-1 text-warning mb-2"></i>
                      <h6 class="fw-bold small">Déposez votre justificatif</h6>
                      <p class="text-muted small mb-2">Facture EDF, quittance</p>
                      <input type="file" name="justificatif_domicile" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png" required>
                      <div class="invalid-feedback">Veuillez sélectionner un fichier.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Boutons d'action -->
          <div class="text-center mt-5">
            <button type="submit" class="btn btn-primary btn-lg px-5 me-3">
              <i class="bi bi-upload me-2"></i>Déposer mes documents
            </button>
            <a href="/inscription/index.php?page=student_dashboard" class="btn btn-outline-secondary btn-lg">
              <i class="bi bi-arrow-left me-2"></i>Retour au tableau de bord
            </a>
          </div>
        </form>

        <!-- Documents déjà déposés -->
        <?php if (!empty($documents)): ?>
          <div class="mt-5">
            <div class="card shadow-lg border-0">
              <div class="card-header bg-light border-0 py-4">
                <h4 class="mb-0 text-center">
                  <i class="bi bi-folder-check text-success me-2"></i>Documents déposés
                </h4>
              </div>
              <div class="card-body p-4">
                <div class="row g-3">
                  <?php foreach ($documents as $doc): ?>
                    <div class="col-md-6 col-lg-3">
                      <div class="document-item p-3 rounded-3 bg-light border">
                        <div class="d-flex align-items-center">
                          <div class="me-3">
                            <i class="bi bi-file-earmark-text fs-2 text-primary"></i>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold"><?= htmlspecialchars($doc['type_document']) ?></h6>
                            <small class="text-muted">
                              <?php if (isset($doc['date_creation'])): ?>
                                Déposé le <?= date('d/m/Y', strtotime($doc['date_creation'])) ?>
                              <?php else: ?>
                                Document déposé
                              <?php endif; ?>
                            </small>
                          </div>
                          <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                              <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/inscription/<?= $doc['chemin'] ?>" target="_blank">
                                <i class="bi bi-eye me-2"></i>Voir
                              </a></li>
                              <li><a class="dropdown-item text-danger" href="/inscription/index.php?page=student_upload_documents&delete=<?= $doc['id'] ?>" 
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?')">
                                <i class="bi bi-trash me-2"></i>Supprimer
                              </a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Inclusion des fichiers CSS et JS -->
<link rel="stylesheet" href="/inscription/assets/css/student.css">
<script src="/inscription/assets/js/student.js"></script>

<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
