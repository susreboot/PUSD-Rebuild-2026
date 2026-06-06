// School directory tab switching
function showTab(tab) {
  const hsGrid = document.getElementById('dir-hs');
  const aeGrid = document.getElementById('dir-ae');
  const tabHs = document.getElementById('tab-hs');
  const tabAe = document.getElementById('tab-ae');

  // Ensure elements exist before manipulating to avoid console errors
  if (hsGrid && aeGrid && tabHs && tabAe) {
    hsGrid.style.display = tab === 'hs' ? 'grid' : 'none';
    aeGrid.style.display = tab === 'ae' ? 'grid' : 'none';
    tabHs.classList.toggle('active', tab === 'hs');
    tabAe.classList.toggle('active', tab === 'ae');
  }
}

// Close search modal with Escape key
document.addEventListener('keydown', function(e) {
  const searchModal = document.getElementById('search-modal');
  if (e.key === 'Escape' && searchModal) {
    searchModal.style.display = 'none';
  }
});

// Optional: Add logic to open the search modal via button click 
// (assuming your search button has id="open-search")
const searchBtn = document.getElementById('open-search');
const searchModal = document.getElementById('search-modal');

if (searchBtn && searchModal) {
  searchBtn.addEventListener('click', () => {
    searchModal.style.display = 'block';
  });
}

// Smooth active nav highlighting on scroll (optional enhancement)
const sections = document.querySelectorAll('section[id]');
window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(section => {
    const sectionTop = section.offsetTop;
    if (pageYOffset >= sectionTop - 60) {
      current = section.getAttribute('id');
    }
  });
  
  // Logic to highlight nav items based on the 'current' variable would go here
});