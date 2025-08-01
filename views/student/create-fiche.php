<?php 
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
include_once(__DIR__ . '/../layouts/header.php'); ?>

<div class="container py-5 px-4">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <!-- Header de la page -->
      <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary mb-3">
          <i class="bi bi-person-plus me-3"></i>Créer ma fiche d'inscription
        </h1>
        <p class="lead text-muted">Complétez toutes les informations requises pour votre inscription</p>
      </div>

      <form action="" method="POST" class="needs-validation" novalidate>
        <!-- Informations personnelles -->
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-person me-2"></i>Informations personnelles</h5>
          </div>
          <div class="card-body p-4">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nom" class="form-label fw-semibold">Nom <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="nom" name="nom" 
                       value="<?= htmlspecialchars($user['nom'] ?? '') ?>" 
                       placeholder="Votre nom de famille" required>
                <div class="invalid-feedback">Veuillez saisir votre nom.</div>
              </div>
              <div class="col-md-6">
                <label for="prenom" class="form-label fw-semibold">Prénom <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="prenom" name="prenom" 
                       value="<?= htmlspecialchars($user['prenom'] ?? '') ?>" 
                       placeholder="Votre prénom" required>
                <div class="invalid-feedback">Veuillez saisir votre prénom.</div>
              </div>
              <div class="col-md-6">
                <label for="date_naissance" class="form-label fw-semibold">Date de naissance <span class="text-danger">*</span></label>
                <input type="date" class="form-control form-control-lg" id="date_naissance" name="date_naissance" required>
                <div class="invalid-feedback">Veuillez saisir votre date de naissance.</div>
              </div>
              <div class="col-md-6">
                <label for="lieu_naissance" class="form-label fw-semibold">Lieu de naissance <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="lieu_naissance" name="lieu_naissance" 
                       placeholder="Ville, Pays" required>
                <div class="invalid-feedback">Veuillez saisir votre lieu de naissance.</div>
              </div>
              <div class="col-md-6">
                <label for="sexe" class="form-label fw-semibold">Sexe <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg" id="sexe" name="sexe" required>
                  <option value="">Choisir...</option>
                  <option value="M">Masculin</option>
                  <option value="F">Féminin</option>
                </select>
                <div class="invalid-feedback">Veuillez sélectionner votre sexe.</div>
              </div>
              <div class="col-md-6">
                <label for="nationalite" class="form-label fw-semibold">Nationalité <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="nationalite" name="nationalite" 
                       placeholder="Votre nationalité" required>
                <div class="invalid-feedback">Veuillez saisir votre nationalité.</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Coordonnées -->
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="bi bi-geo-alt me-2"></i>Coordonnées</h5>
          </div>
          <div class="card-body p-4">
            <div class="row g-3">
              <div class="col-12">
                <label for="adresse" class="form-label fw-semibold">Adresse complète <span class="text-danger">*</span></label>
                <textarea class="form-control form-control-lg" id="adresse" name="adresse" rows="3" 
                          placeholder="Numéro, rue, ville, code postal, pays" required><?= htmlspecialchars($user['adresse'] ?? '') ?></textarea>
                <div class="invalid-feedback">Veuillez saisir votre adresse complète.</div>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" 
                       value="<?= htmlspecialchars($user['email'] ?? '') ?>" 
                       placeholder="votre.email@exemple.com" required>
                <div class="invalid-feedback">Veuillez saisir une adresse email valide.</div>
              </div>
              <div class="col-md-6">
                <label for="telephone" class="form-label fw-semibold">Téléphone</label>
                <input type="tel" class="form-control form-control-lg" id="telephone" name="telephone" 
                       value="<?= htmlspecialchars($user['telephone'] ?? '') ?>" 
                       placeholder="+33 6 12 34 56 78">
              </div>
            </div>
          </div>
        </div>

        <!-- Formation -->
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="bi bi-mortarboard me-2"></i>Formation</h5>
          </div>
          <div class="card-body p-4">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="diplome" class="form-label fw-semibold">Dernier diplôme obtenu <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="diplome" name="diplome" 
                       placeholder="Ex: Baccalauréat, Licence, Master..." required>
                <div class="invalid-feedback">Veuillez saisir votre dernier diplôme.</div>
              </div>
              <div class="col-md-6">
                <label for="etablissement_precedent" class="form-label fw-semibold">Établissement précédent <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="etablissement_precedent" name="etablissement_precedent" 
                       placeholder="Nom de l'établissement" required>
                <div class="invalid-feedback">Veuillez saisir votre établissement précédent.</div>
              </div>
              <div class="col-md-6">
                <label for="formation" class="form-label fw-semibold">Formation demandée <span class="text-danger">*</span></label>
                <select class="form-select form-select-lg" id="formation" name="formation" required>
                  <option value="">Choisir une formation...</option>
                  <option value="Licence Informatique">Licence Informatique</option>
                  <option value="Licence Mathématiques">Licence Mathématiques</option>
                  <option value="Licence Physique">Licence Physique</option>
                  <option value="Master Informatique">Master Informatique</option>
                  <option value="Master Mathématiques">Master Mathématiques</option>
                  <option value="Master Physique">Master Physique</option>
                </select>
                <div class="invalid-feedback">Veuillez sélectionner une formation.</div>
              </div>
              <div class="col-md-6">
                <label for="specialisation" class="form-label fw-semibold">Spécialisation <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg" id="specialisation" name="specialisation" 
                       placeholder="Votre spécialisation" required>
                <div class="invalid-feedback">Veuillez saisir votre spécialisation.</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact d'urgence -->
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-header bg-warning text-dark">
            <h5 class="mb-0"><i class="bi bi-telephone me-2"></i>Contact d'urgence</h5>
          </div>
          <div class="card-body p-4">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="urgence_nom" class="form-label fw-semibold">Nom du contact</label>
                <input type="text" class="form-control form-control-lg" id="urgence_nom" name="urgence_nom" 
                       placeholder="Nom et prénom du contact">
              </div>
              <div class="col-md-6">
                <label for="urgence_relation" class="form-label fw-semibold">Relation avec l'étudiant</label>
                <select class="form-select form-select-lg" id="urgence_relation" name="urgence_relation">
                  <option value="">Choisir...</option>
                  <option value="Parent">Parent</option>
                  <option value="Conjoint">Conjoint</option>
                  <option value="Frère/Sœur">Frère/Sœur</option>
                  <option value="Ami">Ami</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="urgence_telephone" class="form-label fw-semibold">Téléphone du contact</label>
                <input type="tel" class="form-control form-control-lg" id="urgence_telephone" name="urgence_telephone" 
                       placeholder="+33 6 12 34 56 78">
              </div>
              <div class="col-md-6">
                <label for="urgence_email" class="form-label fw-semibold">Email du contact</label>
                <input type="email" class="form-control form-control-lg" id="urgence_email" name="urgence_email" 
                       placeholder="contact@exemple.com">
              </div>
            </div>
          </div>
        </div>

        <!-- Boutons d'action -->
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-lg px-5 me-3">
            <i class="bi bi-check-circle me-2"></i>Enregistrer ma fiche
          </button>
          <a href="/inscription/index.php?page=student_dashboard" class="btn btn-outline-secondary btn-lg">
            <i class="bi bi-arrow-left me-2"></i>Retour au tableau de bord
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Inclusion des fichiers CSS et JS -->
<script src="/inscription/assets/js/student.js"></script>

<?php include_once(__DIR__ . '/../layouts/footer.php'); ?>
