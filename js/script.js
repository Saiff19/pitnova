// =============================================
// PITNOVA — script.js
// =============================================

// Lien actif automatique selon la page courante
const links = document.querySelectorAll('.nav ul li a');
links.forEach(function(link) {
  if (link.href === window.location.href) {
    link.classList.add('active');
  }
});

// Animation des cartes au survol
const cards = document.querySelectorAll('.card');
cards.forEach(function(card) {
  card.addEventListener('mouseenter', function() {
    card.style.transform = 'translateY(-5px)';
    card.style.transition = 'transform 0.2s';
    card.style.boxShadow = '0 8px 24px rgba(0,0,0,0.1)';
  });
  card.addEventListener('mouseleave', function() {
    card.style.transform = 'translateY(0)';
    card.style.boxShadow = 'none';
  });
});
