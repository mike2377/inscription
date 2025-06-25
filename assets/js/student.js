// JavaScript pour l'interface étudiant

// Validation Bootstrap pour les formulaires
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// Animation de la barre de progression du dashboard
document.addEventListener('DOMContentLoaded', function() {
  const progressBar = document.querySelector('.progress-bar');
  if (progressBar) {
    setTimeout(() => {
      progressBar.style.transition = 'width 1s ease-in-out';
      progressBar.style.width = progressBar.getAttribute('style').split('width: ')[1].split('%')[0] + '%';
    }, 500);
  }
});

// Animation des zones de drop pour l'upload de documents
document.addEventListener('DOMContentLoaded', function() {
  const uploadZones = document.querySelectorAll('.upload-zone');
  
  uploadZones.forEach(zone => {
    const input = zone.querySelector('input[type="file"]');
    
    if (input) {
      input.addEventListener('change', function() {
        if (this.files.length > 0) {
          zone.style.borderColor = '#28a745';
          zone.style.backgroundColor = '#d4edda';
          const icon = zone.querySelector('i');
          if (icon) {
            icon.className = 'bi bi-check-circle display-4 text-success mb-3';
          }
        }
      });
      
      // Effet drag & drop
      zone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('dragover');
      });
      
      zone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
      });
      
      zone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
          input.files = files;
          input.dispatchEvent(new Event('change'));
        }
      });
    }
  });
}); 