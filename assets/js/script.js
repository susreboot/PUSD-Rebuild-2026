// School directory tab switching
window.showTab = function(tab) {
  const hsGrid = document.getElementById('dir-hs');
  const aeGrid = document.getElementById('dir-ae');
  const tabHs = document.getElementById('tab-hs');
  const tabAe = document.getElementById('tab-ae');

  // If elements don't exist, log an error so you know which ID is missing
  if (!hsGrid || !aeGrid || !tabHs || !tabAe) {
    console.error("Tab switching failed: One or more IDs (dir-hs, dir-ae, tab-hs, tab-ae) were not found in the HTML.");
    return;
  }

  // Toggle grids
  hsGrid.style.display = tab === 'hs' ? 'grid' : 'none';
  aeGrid.style.display = tab === 'ae' ? 'grid' : 'none';

  // Toggle active class on buttons
  tabHs.classList.toggle('active', tab === 'hs');
  tabAe.classList.toggle('active', tab === 'ae');
};

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

// Check URL for tab parameter on load
window.addEventListener('load', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
    
    if (tab === 'hs' || tab === 'ae') {
        // 1. Switch the tab
        window.showTab(tab);
        
        // 2. Use requestAnimationFrame to ensure the browser has 
        // finished all layout recalculations (the "reflow")
        requestAnimationFrame(() => {
            const section = document.getElementById('school-directory');
            if (section) {
                const headerOffset = 120; // Adjust for your fixed nav height
                const elementPosition = section.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    }
});

window.handleTabClick = function(tab) {
    window.showTab(tab);
    
    const section = document.getElementById('school-directory');
    if (section) {
        // Increase this to match your CSS scroll-margin-top
        const headerOffset = 150; 
        const elementPosition = section.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
    history.pushState(null, '', `index.php?tab=${tab}`);
};

window.scrollToDirectory = function() {
    const section = document.getElementById('school-directory');
    if (section) {
        const headerOffset = 150; // Adjust for your fixed navbar height
        const elementPosition = section.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
        
        // Update URL to remove any old ?tab= parameters if desired
        history.pushState(null, '', 'index.php');
    }
};

// Toggle submenu on click for touch devices
document.querySelectorAll('.dropdown > a').forEach(item => {
    item.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
            e.preventDefault();
            item.nextElementSibling.style.display = 
                item.nextElementSibling.style.display === 'block' ? 'none' : 'block';
        }
    });
});