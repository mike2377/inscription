// JavaScript commun pour toutes les pages

// Fonction pour ouvrir/fermer la sidebar
function openSidebar() {
    document.getElementById("sidebar").style.display = "block";
}

function closeSidebar() {
    document.getElementById("sidebar").style.display = "none";
}

// Initialisation Animate On Scroll
document.addEventListener('DOMContentLoaded', function() {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }
});

// scroll pour les liens
document.addEventListener('DOMContentLoaded', function() {
    if (typeof $ !== 'undefined') {
        $('a[href^="#"]').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 80
            }, 800);
        });
    }
});

// Zoom lent sur l'image de fond (page d'accueil)
document.addEventListener('DOMContentLoaded', function() {
    if (typeof $ !== 'undefined' && $('.hero-bg').length > 0) {
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            $('.hero-bg').css('transform', 'scale(' + (1.05 + scroll/2000) + ')');
        });
    }
}); 