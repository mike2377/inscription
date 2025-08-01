<?php 
// KEMBOU KEUMOE Ivan Michael (L2024GLSI0021)
// Sidebar obsolète, voir header.php pour la nouvelle version Bootstrap ?>

<?php
// Sidebar Bootstrap moderne pour l'admin
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $admin_avatar = 'https://ui-avatars.com/api/?name=Admin&background=1565c0&color=fff&rounded=true&size=64';
    ?>
    <aside class="col-md-3 col-lg-2 d-md-block bg-white shadow-sm rounded-4 p-0 sidebar-admin d-flex flex-column justify-content-between">
      <div>
        <div class="p-4 border-bottom text-center">
          <img src="<?= $admin_avatar ?>" alt="Avatar Admin" width="56" height="56" class="bg-white rounded-circle shadow-sm mb-2">
          <div class="fw-bold text-primary">Admin UAC</div>
        </div>
        <nav class="nav flex-column py-3">
          <a href="/inscription/index.php?page=admin_dashboard" class="nav-link px-4 py-2 text-dark fw-semibold<?php if(isset($_GET['page']) && $_GET['page']==='admin_dashboard') echo ' active'; ?>">
            <span class="sidebar-active-bar"></span><i class="bi bi-speedometer2 me-2"></i> Dashboard
          </a>
          <a href="/inscription/index.php?page=admin_students" class="nav-link px-4 py-2 text-dark fw-semibold<?php if(isset($_GET['page']) && $_GET['page']==='admin_students') echo ' active'; ?>">
            <span class="sidebar-active-bar"></span><i class="bi bi-people me-2"></i> Fiches étudiants
          </a>
          <a href="/inscription/controllers/AuthController.php?logout=true" class="nav-link px-4 py-2 text-danger fw-semibold mt-3">
            <span class="sidebar-active-bar"></span><i class="bi bi-box-arrow-right me-2"></i> Déconnexion
          </a>
        </nav>
      </div>
      <div class="text-center small text-muted pb-3 pt-2">Connecté en tant qu'admin</div>
    </aside>
    <!-- Sidebar mobile (offcanvas) -->
    <div class="d-md-none">
      <button class="btn btn-primary m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebarMobile" aria-controls="adminSidebarMobile">
        <i class="bi bi-list"></i> Menu
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebarMobile" aria-labelledby="adminSidebarMobileLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="adminSidebarMobileLabel">Admin UAC</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <nav class="nav flex-column">
            <a href="/inscription/index.php?page=admin_dashboard" class="nav-link px-2 py-2 text-dark fw-semibold">
              <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="/inscription/index.php?page=admin_students" class="nav-link px-2 py-2 text-dark fw-semibold">
              <i class="bi bi-people me-2"></i> Fiches étudiants
            </a>
            <a href="/inscription/controllers/AuthController.php?logout=true" class="nav-link px-2 py-2 text-danger fw-semibold mt-3">
              <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
            </a>
          </nav>
          <div class="text-center small text-muted pt-3">Connecté en tant qu'admin</div>
        </div>
      </div>
    </div>
    <?php
} elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'etudiant') {
    $etudiant_avatar = 'https://ui-avatars.com/api/?name=Etudiant&background=1565c0&color=fff&rounded=true&size=64';
    $etudiant_nom = $_SESSION['nom'] ?? 'Étudiant';
    $etudiant_prenom = $_SESSION['prenom'] ?? '';
    ?>
    <aside class="col-md-3 col-lg-2 d-md-block bg-white shadow-sm rounded-4 p-0 sidebar-etudiant d-flex flex-column justify-content-between">
      <div>
        <div class="p-4 border-bottom text-center">
          <img src="<?= $etudiant_avatar ?>" alt="Avatar Étudiant" width="56" height="56" class="bg-white rounded-circle shadow-sm mb-2">
          <div class="fw-bold text-primary"><?= htmlspecialchars($etudiant_nom . ' ' . $etudiant_prenom) ?></div>
        </div>
        <nav class="nav flex-column py-3">
          <a href="/inscription/index.php?page=student_dashboard" class="nav-link px-4 py-2 text-dark fw-semibold<?php if(isset($_GET['page']) && $_GET['page']==='student_dashboard') echo ' active'; ?>">
            <span class="sidebar-active-bar"></span><i class="bi bi-speedometer2 me-2"></i> Tableau de bord
          </a>
          <a href="/inscription/index.php?page=student_profile" class="nav-link px-4 py-2 text-dark fw-semibold<?php if(isset($_GET['page']) && $_GET['page']==='student_profile') echo ' active'; ?>">
            <span class="sidebar-active-bar"></span><i class="bi bi-person-vcard me-2"></i> Ma fiche
          </a>
          <a href="/inscription/index.php?page=student_edit_profile" class="nav-link px-4 py-2 text-dark fw-semibold<?php if(isset($_GET['page']) && $_GET['page']==='student_edit_profile') echo ' active'; ?>">
            <span class="sidebar-active-bar"></span><i class="bi bi-pencil-square me-2"></i> Modifier mes infos
          </a>
          <a href="/inscription/index.php?page=student_upload_documents" class="nav-link px-4 py-2 text-dark fw-semibold<?php if(isset($_GET['page']) && $_GET['page']==='student_upload_documents') echo ' active'; ?>">
            <span class="sidebar-active-bar"></span><i class="bi bi-upload me-2"></i> Mes documents
          </a>
          <a href="/inscription/controllers/AuthController.php?logout=true" class="nav-link px-4 py-2 text-danger fw-semibold mt-3">
            <span class="sidebar-active-bar"></span><i class="bi bi-box-arrow-right me-2"></i> Déconnexion
          </a>
        </nav>
      </div>
      <div class="text-center small text-muted pb-3 pt-2">Connecté en tant qu'étudiant</div>
    </aside>
    <!-- Sidebar mobile (offcanvas) -->
    <div class="d-md-none">
      <button class="btn btn-primary m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#etudiantSidebarMobile" aria-controls="etudiantSidebarMobile">
        <i class="bi bi-list"></i> Menu
      </button>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="etudiantSidebarMobile" aria-labelledby="etudiantSidebarMobileLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="etudiantSidebarMobileLabel">Espace étudiant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <nav class="nav flex-column">
            <a href="/inscription/index.php?page=student_dashboard" class="nav-link px-2 py-2 text-dark fw-semibold">
              <i class="bi bi-speedometer2 me-2"></i> Tableau de bord
            </a>
            <a href="/inscription/index.php?page=student_profile" class="nav-link px-2 py-2 text-dark fw-semibold">
              <i class="bi bi-person-vcard me-2"></i> Ma fiche
            </a>
            <a href="/inscription/index.php?page=student_edit_profile" class="nav-link px-2 py-2 text-dark fw-semibold">
              <i class="bi bi-pencil-square me-2"></i> Modifier mes infos
            </a>
            <a href="/inscription/index.php?page=student_upload_documents" class="nav-link px-2 py-2 text-dark fw-semibold">
              <i class="bi bi-upload me-2"></i> Mes documents
            </a>
            <a href="/inscription/controllers/AuthController.php?logout=true" class="nav-link px-2 py-2 text-danger fw-semibold mt-3">
              <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
            </a>
          </nav>
          <div class="text-center small text-muted pt-3">Connecté en tant qu'étudiant</div>
        </div>
      </div>
    </div>
    <?php
}
?>

<!-- Inclusion des fichiers CSS et JS -->
<script src="/inscription/assets/js/common.js"></script>