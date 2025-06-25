// JavaScript pour l'interface admin

// Filtrage et recherche des étudiants
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const formationFilter = document.getElementById('formationFilter');
  const studentRows = document.querySelectorAll('.student-row');
  const noResults = document.getElementById('noResults');

  function filterStudents() {
    const searchTerm = searchInput.value.toLowerCase();
    const statusValue = statusFilter.value;
    const formationValue = formationFilter.value.toLowerCase();
    let visibleCount = 0;

    studentRows.forEach(row => {
      const name = row.dataset.name;
      const status = row.dataset.status;
      const formation = row.dataset.formation;
      
      const matchesSearch = name.includes(searchTerm);
      const matchesStatus = !statusValue || status === statusValue;
      const matchesFormation = !formationValue || formation.includes(formationValue);
      
      if (matchesSearch && matchesStatus && matchesFormation) {
        row.style.display = '';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    // Afficher/masquer le message "aucun résultat"
    if (visibleCount === 0) {
      noResults.style.display = 'block';
    } else {
      noResults.style.display = 'none';
    }
  }

  if (searchInput) searchInput.addEventListener('input', filterStudents);
  if (statusFilter) statusFilter.addEventListener('change', filterStudents);
  if (formationFilter) formationFilter.addEventListener('change', filterStudents);

  // Export (simulation)
  const exportBtn = document.getElementById('exportBtn');
  if (exportBtn) {
    exportBtn.addEventListener('click', function() {
      alert('Fonctionnalité d\'export à implémenter');
    });
  }
});

// Mise à jour du statut des étudiants
function updateStatus(studentId, newStatus) {
  if (confirm('Êtes-vous sûr de vouloir modifier le statut de cet étudiant ?')) {
    // Ici, vous pouvez ajouter une requête AJAX pour mettre à jour le statut
    alert('Statut mis à jour pour l\'étudiant ' + studentId + ' vers ' + newStatus);
    location.reload();
  }
}

// Animation des statistiques du dashboard
document.addEventListener('DOMContentLoaded', function() {
  const counters = document.querySelectorAll('.display-4');
  counters.forEach(counter => {
    const target = parseInt(counter.textContent);
    if (!isNaN(target)) {
      let current = 0;
      const increment = target / 50;
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        counter.textContent = Math.floor(current);
      }, 30);
    }
  });
}); 