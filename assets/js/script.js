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
    
    const section = document.getElementById('school-directory');
    if (section) {
        // Increase this to match CSS scroll-margin-top
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

// Search Input Listener
document.addEventListener('input', function(e) {
    if (e.target && e.target.id === 'search-input') {
        const query = e.target.value.toLowerCase();
        const resultsContainer = document.getElementById('search-results');

        if (query.length < 3) {
            resultsContainer.innerHTML = '';
            return;
        }

        fetch('./assets/data/search-index.json')
            .then(response => response.json())
            .then(data => {
                const matches = data.filter(item => 
                    item.title.toLowerCase().includes(query) || 
                    (item.text && item.text.toLowerCase().includes(query))
                );
                displayResults(matches);
            })
            .catch(err => console.error('Search error:', err));
    }
});

function displayResults(matches) {
    const container = document.getElementById('search-results');
    container.innerHTML = ''; 

    if (matches.length === 0) {
        container.innerHTML = '<div style="padding: 10px; color: #888;">No results found.</div>';
        return;
    }

    matches.forEach(item => {
        const div = document.createElement('div');
        div.style.padding = '12px';
        div.style.borderBottom = '1px solid #eee';
        div.style.cursor = 'pointer';
        
        div.innerHTML = `
            <div style="font-weight: bold; color: #333;">📄 ${item.title}</div>
            <div style="font-size: 12px; color: #777; margin-top: 4px;">${item.text.substring(0, 75)}...</div>
        `;
        
        div.onclick = () => {
            // Close the overlay
            document.getElementById('search-overlay').style.display = 'none';
            // Navigate using encodeURI to fix spaces in filenames
            window.location.href = encodeURI(item.link);
        };
        
        div.onmouseover = () => div.style.backgroundColor = '#f9f9f9';
        div.onmouseout = () => div.style.backgroundColor = 'white';
        
        container.appendChild(div);
    });
}