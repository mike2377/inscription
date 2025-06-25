<?php include_once(__DIR__ . '/../layouts/header.php'); ?>

<style>
.student-detail-page {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.student-header {
    background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);
    color: white;
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 30px rgba(13, 110, 253, 0.3);
}

.student-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    font-weight: bold;
    margin-right: 1.5rem;
}

.info-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: none;
    overflow: hidden;
}

.info-card .card-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-bottom: 1px solid #dee2e6;
    padding: 1.5rem;
}

.nav-tabs {
    border: none;
    background: #f8f9fa;
    border-radius: 0.75rem;
    padding: 0.5rem;
    margin-bottom: 2rem;
}

.nav-tabs .nav-link {
    border: none;
    border-radius: 0.5rem;
    color: #6c757d;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link.active {
    background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 0.75rem;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.document-item {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 0.75rem;
    padding: 1rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.document-item:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.document-icon {
    width: 50px;
    height: 50px;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    margin-right: 1rem;
}

.document-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-action {
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
}

.btn-view {
    background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);
    color: white;
}

.btn-replace {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
    color: white;
}

.btn-delete {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

.btn-action:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    color: white;
}

.status-badge {
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-weight: 600;
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.section-title {
    color: #0d6efd;
    font-weight: 700;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #e9ecef;
}

@media (max-width: 768px) {
    .student-header {
        padding: 1.5rem;
    }
    
    .document-actions {
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .btn-action {
        width: 100%;
    }
}
</style>

<div class="student-detail-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <!-- En-tête étudiant -->
                <div class="student-header">
                    <div class="d-flex align-items-center">
                        <div class="student-avatar">
                            <?= strtoupper(substr($fiche['prenom'] ?? '', 0, 1) . substr($fiche['nom'] ?? '', 0, 1)) ?>
                        </div>
                        <div class="flex-grow-1">
                            <h1 class="mb-1"><?= htmlspecialchars($fiche['prenom'] ?? '') ?> <?= htmlspecialchars($fiche['nom'] ?? '') ?></h1>
                            <p class="mb-2 opacity-75">
                                <i class="bi bi-envelope me-2"></i><?= htmlspecialchars($fiche['email'] ?? '') ?>
                                <i class="bi bi-telephone ms-3 me-2"></i><?= htmlspecialchars($fiche['telephone'] ?? '') ?>
                            </p>
                            <p class="mb-0 opacity-75">
                                <i class="bi bi-mortarboard me-2"></i><?= htmlspecialchars($fiche['formation'] ?? '') ?>
                                <?php if (!empty($fiche['specialisation'])): ?>
                                    - <?= htmlspecialchars($fiche['specialisation']) ?>
                                <?php endif; ?>
                            </p>
                        </div>
                        <?php if (isset($fiche['statut'])): ?>
                            <?php
                                $statut = $fiche['statut'];
                                $badgeClass = 'bg-secondary';
                                $icon = 'clock';
                                $label = 'En attente';
                                if ($statut === 'validee') { 
                                    $badgeClass = 'bg-success'; 
                                    $icon = 'check-circle'; 
                                    $label = 'Validée'; 
                                } elseif ($statut === 'refusee') { 
                                    $badgeClass = 'bg-danger'; 
                                    $icon = 'x-circle'; 
                                    $label = 'Refusée'; 
                                }
                            ?>
                            <div class="status-badge <?= $badgeClass ?>">
                                <i class="bi bi-<?= $icon ?>"></i>
                                <?= $label ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (isset($fiche) && $fiche): ?>
                <!-- Onglets -->
                <div class="info-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs" id="ficheTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="infos-tab" data-bs-toggle="tab" data-bs-target="#infos" type="button" role="tab">
                                    <i class="bi bi-person-circle me-2"></i>Informations
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="docs-tab" data-bs-toggle="tab" data-bs-target="#docs" type="button" role="tab">
                                    <i class="bi bi-file-earmark-text me-2"></i>Documents
                                </button>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card-body p-4">
                        <div class="tab-content" id="ficheTabContent">
                            <!-- Onglet Informations -->
                            <div class="tab-pane fade show active" id="infos" role="tabpanel">
                                <form action="" method="POST">
                                    <h4 class="section-title">
                                        <i class="bi bi-person-badge me-2"></i>Informations personnelles
                                    </h4>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Nom</label>
                                            <input class="form-control" type="text" name="nom" value="<?= htmlspecialchars($fiche['nom']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Prénom</label>
                                            <input class="form-control" type="text" name="prenom" value="<?= htmlspecialchars($fiche['prenom']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Date de naissance</label>
                                            <input class="form-control" type="date" name="date_naissance" value="<?= htmlspecialchars($fiche['date_naissance']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Lieu de naissance</label>
                                            <input class="form-control" type="text" name="lieu_naissance" value="<?= htmlspecialchars($fiche['lieu_naissance']) ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Sexe</label>
                                            <input class="form-control" type="text" name="sexe" value="<?= htmlspecialchars($fiche['sexe']) ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Nationalité</label>
                                            <input class="form-control" type="text" name="nationalite" value="<?= htmlspecialchars($fiche['nationalite']) ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Adresse</label>
                                            <input class="form-control" type="text" name="adresse" value="<?= htmlspecialchars($fiche['adresse']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" name="email" value="<?= htmlspecialchars($fiche['email']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Téléphone</label>
                                            <input class="form-control" type="text" name="telephone" value="<?= htmlspecialchars($fiche['telephone']) ?>">
                                        </div>
                                    </div>

                                    <h4 class="section-title">
                                        <i class="bi bi-mortarboard me-2"></i>Formation
                                    </h4>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Diplôme</label>
                                            <input class="form-control" type="text" name="diplome" value="<?= htmlspecialchars($fiche['diplome']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Établissement précédent</label>
                                            <input class="form-control" type="text" name="etablissement_precedent" value="<?= htmlspecialchars($fiche['etablissement_precedent']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Formation demandée</label>
                                            <input class="form-control" type="text" name="formation" value="<?= htmlspecialchars($fiche['formation']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Spécialisation</label>
                                            <input class="form-control" type="text" name="specialisation" value="<?= htmlspecialchars($fiche['specialisation']) ?>">
                                        </div>
                                    </div>

                                    <h4 class="section-title">
                                        <i class="bi bi-telephone me-2"></i>Contact d'urgence
                                    </h4>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Nom</label>
                                            <input class="form-control" type="text" name="urgence_nom" value="<?= htmlspecialchars($fiche['urgence_nom']) ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Relation</label>
                                            <input class="form-control" type="text" name="urgence_relation" value="<?= htmlspecialchars($fiche['urgence_relation']) ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Téléphone</label>
                                            <input class="form-control" type="text" name="urgence_telephone" value="<?= htmlspecialchars($fiche['urgence_telephone']) ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" name="urgence_email" value="<?= htmlspecialchars($fiche['urgence_email']) ?>">
                                        </div>
                                    </div>

                                    <h4 class="section-title">
                                        <i class="bi bi-gear me-2"></i>Administration
                                    </h4>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <label class="form-label">Commentaires</label>
                                            <textarea class="form-control" name="commentaires" rows="3"><?= htmlspecialchars($fiche['commentaires'] ?? '') ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Statut</label>
                                            <input type="hidden" name="fiche_id" value="<?= htmlspecialchars($fiche['id']) ?>">
                                            <select class="form-select" name="statut">
                                                <option value="en_attente" <?= ($fiche['statut'] ?? '') === 'en_attente' ? 'selected' : '' ?>>En attente</option>
                                                <option value="validee" <?= ($fiche['statut'] ?? '') === 'validee' ? 'selected' : '' ?>>Validée</option>
                                                <option value="refusee" <?= ($fiche['statut'] ?? '') === 'refusee' ? 'selected' : '' ?>>Refusée</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end gap-3">
                                        <a href="/inscription/index.php?page=admin_students" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-left me-2"></i>Retour
                                        </a>
                                        <button class="btn btn-success px-4" type="submit">
                                            <i class="bi bi-check-circle me-2"></i>Mettre à jour
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Onglet Documents -->
                            <div class="tab-pane fade" id="docs" role="tabpanel">
                                <h4 class="section-title">
                                    <i class="bi bi-file-earmark-text me-2"></i>Documents déposés
                                </h4>
                                
                                <?php if (!empty($documents)): ?>
                                    <div class="row">
                                        <?php foreach ($documents as $doc): ?>
                                            <div class="col-md-6 col-lg-4 mb-3">
                                                <div class="document-item">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="document-icon" style="background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1"><?= htmlspecialchars($doc['type_document']) ?></h6>
                                                            <small class="text-muted">
                                                                <?php if (isset($doc['date_creation'])): ?>
                                                                    <i class="bi bi-calendar me-1"></i><?= date('d/m/Y', strtotime($doc['date_creation'])) ?>
                                                                <?php endif; ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="document-actions">
                                                        <a href="/inscription/<?= htmlspecialchars($doc['chemin']) ?>" target="_blank" class="btn btn-action btn-view">
                                                            <i class="bi bi-eye me-1"></i>Voir
                                                        </a>
                                                        <button class="btn btn-action btn-replace" onclick="replaceDocument(<?= $doc['id'] ?>, '<?= htmlspecialchars($doc['type_document']) ?>')">
                                                            <i class="bi bi-arrow-repeat me-1"></i>Remplacer
                                                        </button>
                                                        <button class="btn btn-action btn-delete" onclick="deleteDocument(<?= $doc['id'] ?>, '<?= htmlspecialchars($doc['type_document']) ?>')">
                                                            <i class="bi bi-trash me-1"></i>Supprimer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center py-5">
                                        <i class="bi bi-file-earmark-text display-1 text-muted mb-3"></i>
                                        <h5 class="text-muted">Aucun document déposé</h5>
                                        <p class="text-muted">L'étudiant n'a pas encore soumis de documents.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="info-card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-exclamation-triangle display-1 text-danger mb-3"></i>
                            <h4 class="text-danger">Fiche introuvable</h4>
                            <p class="text-muted">La fiche demandée n'existe pas ou a été supprimée.</p>
                            <a href="/inscription/index.php?page=admin_students" class="btn btn-primary">
                                <i class="bi bi-arrow-left me-2"></i>Retour à la liste
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
function deleteDocument(docId, docType) {
    if (confirm(`Êtes-vous sûr de vouloir supprimer le document "${docType}" ?`)) {
        // Ici vous pouvez ajouter la logique pour supprimer le document
        console.log('Supprimer document:', docId);
        // Exemple: window.location.href = `/inscription/index.php?action=delete_document&id=${docId}`;
    }
}

function replaceDocument(docId, docType) {
    if (confirm(`Voulez-vous remplacer le document "${docType}" ?`)) {
        // Ici vous pouvez ajouter la logique pour remplacer le document
        console.log('Remplacer document:', docId);
        // Exemple: window.location.href = `/inscription/index.php?action=replace_document&id=${docId}`;
    }
}
</script>

<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
