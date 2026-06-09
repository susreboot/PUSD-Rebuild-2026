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
    
    // 1. Handle Tab Switching (AE/HS)
    if (tab === 'hs' || tab === 'ae') {
        window.showTab(tab);
        requestAnimationFrame(() => {
            const section = document.getElementById('school-directory');
            if (section) section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    } 
    
    // 2. Handle School Directory Scroll
    else if (tab === 'directory') {
        setTimeout(() => {
            const section = document.getElementById('school-directory');
            if (section) section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 300);
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
    const overlay = document.getElementById('search-overlay');
    if (overlay) {
        overlay.style.display = 'flex';
        // Use a slight timeout so the input focuses after the display change
        setTimeout(() => {
            const input = document.getElementById('search-input');
            if (input) input.focus();
        }, 50);
    }
}

// Close Modal Function (to be used by both the X button and the background click)
function closeSearch() {
    const overlay = document.getElementById('search-overlay');
    if (overlay) {
        overlay.style.display = 'none';
    }
}

// Close Modal on Overlay Click (Background only)
document.getElementById('search-overlay').addEventListener('click', function(e) {
    // Only close if they click the background, NOT the search box itself
    if (e.target === this) {
        closeSearch();
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

document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.querySelector('.hamburger-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }
});