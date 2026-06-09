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
    
    // Add a small delay to wait for the DOM to update (showTab)
    setTimeout(() => {
        const section = document.getElementById('school-directory');
        if (section) {
            const headerOffset = 150; 
            const elementPosition = section.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    }, 150); // 150ms is usually enough for most browsers to handle the layout shift

    history.pushState(null, '', `index.php?tab=${tab}`);
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

// Open Modal
function openSearch() {
    document.getElementById('search-overlay').style.display = 'flex';
    document.getElementById('search-input').focus();
}

// Close Modal on Overlay Click
document.getElementById('search-overlay').addEventListener('click', function(e) {
    if (e.target === this) {
        this.style.display = 'none';
    }
});

// Scroll for programs page
window.addEventListener('load', function() {
    if (window.location.hash) {
        const target = document.querySelector(window.location.hash);
        if (target) {
            // Because of the CSS scroll-margin-top, this will stop
            // perfectly in the right spot automatically.
            target.scrollIntoView({ behavior: 'smooth' });
        }
    }
});


// Scroll to school directory section when "School Directory" link is clicked
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');

    if (tabParam === 'ae' || tabParam === 'hs') {
        handleTabClick(tabParam);
    } else if (tabParam === 'directory') {
        // Used a small timeout to ensure the browser has finished layout
        setTimeout(scrollToDirectory, 300); 
    }
});

function scrollToDirectory() {
    const directorySection = document.getElementById('school-directory');
    if (directorySection) {
        directorySection.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
        });
    }
}