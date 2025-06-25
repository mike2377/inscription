<?php
error_reporting(0);
ini_set('display_errors', 0);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: /inscription/index.php?page=admin_dashboard');
        exit;
    } elseif ($_SESSION['role'] === 'etudiant') {
        header('Location: /inscription/index.php?page=student_dashboard');
        exit;
    }
}
?>
<?php include __DIR__.'/layouts/header.php'; ?>

<!-- Hero Section avec vidéo de fond -->
<section class="hero-section position-relative d-flex align-items-center justify-content-center w-100" style="height: 100vh; min-height: 100vh; padding: 0; margin: 0; overflow: hidden;">
  <!-- Vidéo de fond (optionnelle) -->
  <div class="hero-bg position-absolute top-0 start-0 w-100 h-100" style="z-index:1; background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);"></div>
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(120deg, rgba(21,101,192,0.9) 0%, rgba(30,136,229,0.8) 100%); z-index:2;"></div>
  
  <!-- Particules animées -->
  <div class="particles position-absolute top-0 start-0 w-100 h-100" style="z-index:1;">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
  </div>
  
  <div class="container-fluid position-relative text-center text-white d-flex flex-column justify-content-center align-items-center p-0 m-0 hero-content" style="z-index:3; min-height:100vh; width:100%;">
    <div class="mb-4" data-aos="fade-down" data-aos-duration="1000">
      <img src="/inscription/assets/images/logo.jpg" alt="Logo UAC" width="120" height="120" class="bg-white rounded-circle shadow-lg p-3 mb-3 float-animation" style="object-fit: cover;">
    </div>
    <h1 class="display-1 fw-bold mb-4" data-aos="fade-up" data-aos-delay="200" style="text-shadow:0 8px 32px rgba(0,0,0,0.3); letter-spacing:3px; font-size: 4rem;">
      Plateforme d'Inscription <span class="hero-glow animate__animated animate__pulse animate__infinite">Cosendai</span>
    </h1>
    <p class="lead mb-5" data-aos="fade-up" data-aos-delay="400" style="font-size:1.8rem; max-width:900px; line-height: 1.6;">
      Simplifiez votre avenir à l'<strong>Université Adventiste Cosendai</strong>.<br>
      <span class="text-warning fw-bold">Rejoignez l'excellence académique et humaine.</span>
    </p>
    
    <!-- Statistiques rapides -->
    <div class="row g-4 mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="600">
      <div class="col-md-3">
        <div class="text-center">
          <div class="display-6 fw-bold text-warning mb-2">500+</div>
          <p class="mb-0 opacity-75">Étudiants inscrits</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="text-center">
          <div class="display-6 fw-bold text-info mb-2">95%</div>
          <p class="mb-0 opacity-75">Taux de réussite</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="text-center">
          <div class="display-6 fw-bold text-success mb-2">15+</div>
          <p class="mb-0 opacity-75">Années d'expérience</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="text-center">
          <div class="display-6 fw-bold text-primary mb-2">4</div>
          <p class="mb-0 opacity-75">Facultés</p>
        </div>
      </div>
    </div>
    
    <div class="d-flex flex-wrap justify-content-center gap-4 mb-4" data-aos="zoom-in" data-aos-delay="800">
      <a href="/inscription/index.php?page=register" class="btn btn-lg btn-warning px-5 py-4 shadow-lg hero-btn animate__animated animate__heartBeat animate__delay-1s" style="font-size: 1.2rem; border-radius: 50px;">
        <i class="bi bi-rocket-takeoff me-3"></i>Commencer l'inscription
      </a>
      <a href="/inscription/index.php?page=login" class="btn btn-lg btn-outline-light px-5 py-4 shadow-lg hero-btn" style="font-size: 1.2rem; border-radius: 50px;">
        <i class="bi bi-person-check me-3"></i>Suivre mon dossier
      </a>
    </div>
  </div>
  
  <!-- Scroll indicator -->
  <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4 animate__animated animate__bounce animate__infinite">
    <a href="#steps" class="text-white text-decoration-none">
      <div class="scroll-indicator">
        <i class="bi bi-chevron-double-down fs-2"></i>
        <p class="small mt-2">Découvrir</p>
      </div>
    </a>
  </div>
</section>

<!-- Étapes Section avec design amélioré -->
<section class="py-5 bg-gradient-light" id="steps" style="margin-top:0; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
  <div class="container-fluid px-0">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold text-primary mb-3" data-aos="fade-up">4 étapes simples</h2>
      <p class="lead text-muted mb-0" data-aos="fade-up" data-aos-delay="200">Pour commencer votre aventure académique</p>
      <div class="progress-bar-custom mx-auto mt-4" data-aos="fade-up" data-aos-delay="400">
        <div class="progress-step active"></div>
        <div class="progress-step"></div>
        <div class="progress-step"></div>
        <div class="progress-step"></div>
      </div>
    </div>
    
    <div class="row g-4">
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
        <div class="card h-100 shadow-lg border-0 step-card" style="border-radius: 20px; overflow: hidden;">
          <div class="card-body text-center p-5">
            <div class="icon-circle mb-4 mx-auto d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; background: linear-gradient(135deg, #0d6efd 0%, #0056b3 100%);">
              <i class="bi bi-person-plus display-4 text-white"></i>
            </div>
            <h5 class="card-title fw-bold mb-4 text-primary">Créez votre compte</h5>
            <ul class="list-unstyled mt-3 mb-0 text-secondary">
              <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Email valide requis</li>
              <li class="mb-3"><i class="bi bi-shield-lock-fill text-primary me-2"></i>Mot de passe sécurisé</li>
              <li><i class="bi bi-lightning-fill text-warning me-2"></i>Confirmation immédiate</li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
        <div class="card h-100 shadow-lg border-0 step-card" style="border-radius: 20px; overflow: hidden;">
          <div class="card-body text-center p-5">
            <div class="icon-circle mb-4 mx-auto d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; background: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);">
              <i class="bi bi-file-earmark-text display-4 text-white"></i>
            </div>
            <h5 class="card-title fw-bold mb-4 text-primary">Complétez votre profil</h5>
            <ul class="list-unstyled mt-3 mb-0 text-secondary">
              <li class="mb-3"><i class="bi bi-person-vcard-fill text-info me-2"></i>Informations personnelles</li>
              <li class="mb-3"><i class="bi bi-mortarboard-fill text-primary me-2"></i>Parcours académique</li>
              <li><i class="bi bi-compass-fill text-success me-2"></i>Choix de formation</li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
        <div class="card h-100 shadow-lg border-0 step-card" style="border-radius: 20px; overflow: hidden;">
          <div class="card-body text-center p-5">
            <div class="icon-circle mb-4 mx-auto d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; background: linear-gradient(135deg, #0056b3 0%, #004085 100%);">
              <i class="bi bi-upload display-4 text-white"></i>
            </div>
            <h5 class="card-title fw-bold mb-4 text-primary">Soumettez vos documents</h5>
            <ul class="list-unstyled mt-3 mb-0 text-secondary">
              <li class="mb-3"><i class="bi bi-card-heading text-danger me-2"></i>Pièce d'identité</li>
              <li class="mb-3"><i class="bi bi-file-earmark-pdf-fill text-primary me-2"></i>Diplômes et relevés</li>
              <li><i class="bi bi-camera-fill text-info me-2"></i>Photos d'identité</li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
        <div class="card h-100 shadow-lg border-0 step-card" style="border-radius: 20px; overflow: hidden;">
          <div class="card-body text-center p-5">
            <div class="icon-circle mb-4 mx-auto d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; background: linear-gradient(135deg, #198754 0%, #146c43 100%);">
              <i class="bi bi-check2-circle display-4 text-white"></i>
            </div>
            <h5 class="card-title fw-bold mb-4 text-primary">Suivez votre candidature</h5>
            <ul class="list-unstyled mt-3 mb-0 text-secondary">
              <li class="mb-3"><i class="bi bi-clock-history text-warning me-2"></i>Statut en temps réel</li>
              <li class="mb-3"><i class="bi bi-envelope-check-fill text-success me-2"></i>Notifications par email</li>
              <li><i class="bi bi-headset text-primary me-2"></i>Support disponible</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Avantages -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold text-primary mb-3" data-aos="fade-up">Pourquoi choisir Cosendai ?</h2>
      <p class="lead text-muted" data-aos="fade-up" data-aos-delay="200">Découvrez les avantages de notre université</p>
    </div>
    
    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center p-4">
          <div class="advantage-icon mb-4">
            <i class="bi bi-award display-1 text-warning"></i>
          </div>
          <h4 class="fw-bold mb-3">Excellence Académique</h4>
          <p class="text-muted">Formation de qualité reconnue internationalement avec des enseignants experts dans leur domaine.</p>
        </div>
      </div>
      
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center p-4">
          <div class="advantage-icon mb-4">
            <i class="bi bi-heart display-1 text-danger"></i>
          </div>
          <h4 class="fw-bold mb-3">Valeurs Humaines</h4>
          <p class="text-muted">Développement personnel et spirituel basé sur les valeurs adventistes de respect et d'éthique.</p>
        </div>
      </div>
      
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="text-center p-4">
          <div class="advantage-icon mb-4">
            <i class="bi bi-globe display-1 text-success"></i>
          </div>
          <h4 class="fw-bold mb-3">Ouverture Internationale</h4>
          <p class="text-muted">Partenariats internationaux et programmes d'échange pour une formation ouverte sur le monde.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section améliorée -->
<section class="py-5" id="faq" style="background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="display-4 fw-bold text-primary mb-3" data-aos="fade-up">Questions Fréquentes</h2>
      <p class="lead text-muted" data-aos="fade-up" data-aos-delay="200">Tout ce que vous devez savoir sur le processus d'inscription</p>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion custom-accordion" id="faqAccordion" data-aos="fade-up" data-aos-delay="300">
          <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button rounded-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="bi bi-question-circle-fill text-primary me-2"></i>
                Quels sont les documents requis ?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                <ul class="list-unstyled mb-0">
                  <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Pièce d'identité valide</li>
                  <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Diplômes et relevés de notes</li>
                  <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i>Justificatif de domicile récent</li>
                  <li><i class="bi bi-check2-circle text-success me-2"></i>Photos d'identité récentes</li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed rounded-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="bi bi-clock-history text-warning me-2"></i>
                Comment suivre l'état de mon dossier ?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Connectez-vous à votre espace étudiant pour voir le statut en temps réel de votre candidature.
              </div>
            </div>
          </div>
          
          <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed rounded-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="bi bi-telephone text-info me-2"></i>
                Qui contacter en cas de problème ?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Contactez le support à contact@uac.cm ou au +237 677 87 65 00.
              </div>
            </div>
          </div>
          
          <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed rounded-3 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <i class="bi bi-calendar-check text-success me-2"></i>
                Quand commencent les cours ?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Les cours commencent généralement en septembre. Consultez le calendrier académique pour plus de détails.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section CTA (Call to Action) -->
<section class="py-5 bg-primary text-white">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 class="display-4 fw-bold mb-4" data-aos="fade-up">Prêt à commencer votre aventure ?</h2>
        <p class="lead mb-5" data-aos="fade-up" data-aos-delay="200">Rejoignez l'Université Adventiste Cosendai et donnez vie à vos rêves académiques</p>
        <div class="d-flex flex-wrap justify-content-center gap-4" data-aos="fade-up" data-aos-delay="400">
          <a href="/inscription/index.php?page=register" class="btn btn-warning btn-lg px-5 py-3" style="border-radius: 50px;">
            <i class="bi bi-rocket-takeoff me-2"></i>Commencer maintenant
          </a>
          <a href="/inscription/index.php?page=login" class="btn btn-outline-light btn-lg px-5 py-3" style="border-radius: 50px;">
            <i class="bi bi-person-check me-2"></i>Se connecter
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__.'/layouts/footer.php'; ?>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<!-- jQuery + Animation + AOS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<!-- Inclusion des fichiers CSS et JS -->
<script src="/inscription/assets/js/common.js"></script>