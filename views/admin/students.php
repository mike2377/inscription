<?php 
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
include_once(__DIR__ . '/../layouts/header.php'); ?>

<div class="container py-5 px-4">
  <div class="row justify-content-center">
    <div class="col-12">
      <!-- Header de la page -->
      <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary mb-3">
          <i class="bi bi-people me-3"></i>Gestion des étudiants
        </h1>
        <p class="lead text-muted">Consultez et gérez toutes les fiches d'inscription des étudiants</p>
      </div>

      <!-- Statistiques rapides -->
      <div class="row g-4 mb-5">
        <div class="col-md-3">
          <div class="card text-center shadow-sm border-0">
            <div class="card-body p-3">
              <i class="bi bi-people text-primary fs-1 mb-2"></i>
              <h4 class="fw-bold text-primary"><?= count($fiches) ?></h4>
              <p class="text-muted mb-0">Total étudiants</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center shadow-sm border-0">
            <div class="card-body p-3">
              <i class="bi bi-clock text-warning fs-1 mb-2"></i>
              <h4 class="fw-bold text-warning"><?= count(array_filter($fiches, function($f) { return ($f['statut'] ?? '') === 'en_attente'; })) ?></h4>
              <p class="text-muted mb-0">En attente</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center shadow-sm border-0">
            <div class="card-body p-3">
              <i class="bi bi-check-circle text-success fs-1 mb-2"></i>
              <h4 class="fw-bold text-success"><?= count(array_filter($fiches, function($f) { return ($f['statut'] ?? '') === 'validee'; })) ?></h4>
              <p class="text-muted mb-0">Validées</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center shadow-sm border-0">
            <div class="card-body p-3">
              <i class="bi bi-x-circle text-danger fs-1 mb-2"></i>
              <h4 class="fw-bold text-danger"><?= count(array_filter($fiches, function($f) { return ($f['statut'] ?? '') === 'refusee'; })) ?></h4>
              <p class="text-muted mb-0">Refusées</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Filtres et recherche -->
      <div class="card shadow-lg border-0 mb-4">
        <div class="card-body p-4">
          <div class="row g-3 align-items-end">
            <div class="col-md-4">
              <label class="form-label fw-semibold">Rechercher</label>
              <input type="text" id="searchInput" class="form-control" placeholder="Nom, prénom, email...">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold">Statut</label>
              <select id="statusFilter" class="form-select">
                <option value="">Tous les statuts</option>
                <option value="en_attente">En attente</option>
                <option value="validee">Validée</option>
                <option value="refusee">Refusée</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold">Formation</label>
              <select id="formationFilter" class="form-select">
                <option value="">Toutes les formations</option>
                <option value="Licence">Licence</option>
                <option value="Master">Master</option>
              </select>
            </div>
            <div class="col-md-2">
              <button id="exportBtn" class="btn btn-success w-100">
                <i class="bi bi-download me-2"></i>Exporter
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Tableau des étudiants -->
      <div class="card shadow-lg border-0">
        <div class="card-header bg-light border-0 py-4">
          <h4 class="mb-0">
            <i class="bi bi-table me-2"></i>Liste des étudiants
          </h4>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0" id="studentsTable">
              <thead class="table-light">
                <tr>
                  <th class="px-4 py-3">
                    <i class="bi bi-person me-2"></i>Étudiant
                  </th>
                  <th class="px-3 py-3">
                    <i class="bi bi-envelope me-2"></i>Email
                  </th>
                  <th class="px-3 py-3">
                    <i class="bi bi-mortarboard me-2"></i>Formation
                  </th>
                  <th class="px-3 py-3">
                    <i class="bi bi-info-circle me-2"></i>Statut
                  </th>
                  <th class="px-3 py-3 text-center">
                    <i class="bi bi-gear me-2"></i>Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($fiches as $fiche): ?>
                  <tr class="student-row" 
                      data-name="<?= strtolower($fiche['nom'] . ' ' . $fiche['prenom']) ?>"
                      data-status="<?= $fiche['statut'] ?? 'en_attente' ?>"
                      data-formation="<?= strtolower($fiche['formation'] ?? '') ?>">
                    <td class="px-4 py-3">
                      <div class="d-flex align-items-center">
                        <div class="me-3">
                          <img src="https://ui-avatars.com/api/?name=<?= urlencode($fiche['nom'] . ' ' . $fiche['prenom']) ?>&background=1565c0&color=fff&rounded=true&size=40" 
                               alt="Avatar" class="rounded-circle">
                        </div>
                        <div>
                          <h6 class="mb-1 fw-bold"><?= htmlspecialchars($fiche['nom'] . ' ' . $fiche['prenom']) ?></h6>
                          <small class="text-muted">Inscrit le <?= date('d/m/Y', strtotime($fiche['date_soumission'] ?? 'now')) ?></small>
                        </div>
                      </div>
                    </td>
                    <td class="px-3 py-3">
                      <span class="text-break"><?= htmlspecialchars($fiche['email']) ?></span>
                    </td>
                    <td class="px-3 py-3">
                      <span class="badge bg-info bg-opacity-10 text-info">
                        <?= htmlspecialchars($fiche['formation'] ?? 'Non renseigné') ?>
                      </span>
                    </td>
                    <td class="px-3 py-3">
                      <?php
                        $statut = $fiche['statut'] ?? 'en_attente';
                        $badge = 'secondary'; $icon = 'clock'; $label = 'En attente';
                        if ($statut === 'validee') { $badge = 'success'; $icon = 'check-circle'; $label = 'Validée'; }
                        elseif ($statut === 'refusee') { $badge = 'danger'; $icon = 'x-circle'; $label = 'Refusée'; }
                      ?>
                      <span class="badge bg-<?= $badge ?> d-inline-flex align-items-center px-3 py-2">
                        <i class="bi bi-<?= $icon ?> me-1"></i> <?= $label ?>
                      </span>
                    </td>
                    <td class="px-3 py-3 text-center">
                      <div class="btn-group" role="group">
                        <a href="/inscription/index.php?page=admin_edit_student&id=<?= $fiche['id'] ?>" 
                           class="btn btn-outline-primary btn-sm" title="Voir/Modifier">
                          <i class="bi bi-eye"></i>
                        </a>
                        <button type="button" class="btn btn-outline-success btn-sm" title="Valider" 
                                onclick="updateStatus(<?= $fiche['id'] ?>, 'validee')">
                          <i class="bi bi-check"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm" title="Refuser" 
                                onclick="updateStatus(<?= $fiche['id'] ?>, 'refusee')">
                          <i class="bi bi-x"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Message si aucun résultat -->
      <div id="noResults" class="text-center py-5" style="display: none;">
        <i class="bi bi-search display-1 text-muted mb-3"></i>
        <h4 class="text-muted">Aucun étudiant trouvé</h4>
        <p class="text-muted">Essayez de modifier vos critères de recherche.</p>
      </div>
    </div>
  </div>
</div>

<!-- Inclusion des fichiers CSS et JS -->
<link rel="stylesheet" href="/inscription/assets/css/admin.css">
<script src="/inscription/assets/js/admin.js"></script>

<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
