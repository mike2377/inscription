// Point d'entrée principal de l'application
// Ce fichier charge tous les scripts nécessaires selon la page

document.addEventListener('DOMContentLoaded', function() {
    // Détection de la page actuelle
    const currentPath = window.location.pathname;
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page');
    
    // Chargement conditionnel des scripts selon la page
    if (page === 'admin_students' || page === 'admin_dashboard') {
        // Pages admin
        loadScript('/inscription/assets/js/admin.js');
        loadStylesheet('/inscription/assets/css/admin.css');
    } else if (page && page.startsWith('student_')) {
        // Pages étudiant
        loadScript('/inscription/assets/js/student.js');
        loadStylesheet('/inscription/assets/css/student.css');
    }
    
    // Scripts communs toujours chargés
    loadScript('/inscription/assets/js/common.js');
});

// Fonction pour charger un script dynamiquement
function loadScript(src) {
    if (!document.querySelector(`script[src="${src}"]`)) {
        const script = document.createElement('script');
        script.src = src;
        document.head.appendChild(script);
    }
}

// Fonction pour charger une feuille de style dynamiquement
function loadStylesheet(href) {
    if (!document.querySelector(`link[href="${href}"]`)) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = href;
        document.head.appendChild(link);
    }
}
