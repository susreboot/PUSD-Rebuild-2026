document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('news-container');
    const modal = document.getElementById('news-modal');
    const closeBtn = document.querySelector('.modal-close');

    // Load News Data
    fetch('/assets/data/news.json')
        .then(response => response.json())
        .then(data => {
            console.log(window.location.pathname);
            // Determine if we are on the homepage
            const limit = parseInt(container.dataset.limit, 10);
            
            // Limit to 5 items if on homepage, otherwise show all
            const displayData = limit ? data.slice(0, limit) : data;

            displayData.forEach(item => {
                const card = document.createElement('a');
                card.className = item.featured ? "news-card featured" : "news-card";
                card.href = "#"; // Prevent navigation
                card.dataset.id = item.id; // Store ID in dataset

                let mediaContent = item.icon ? `<span class="material-symbols-outlined" style="font-size: 48px;">${item.icon}</span>` : '';

                card.innerHTML = `
                    <div class="news-card-img">${mediaContent}</div>
                    <div class="news-card-body">
                        <div class="news-tag">${item.tag}</div>
                        <div class="news-title">${item.title}</div>
                        <div class="news-date"><i class="ti ti-calendar"></i> ${item.date}</div>
                    </div>
                `;

                // Add Event Listener instead of onclick
                card.addEventListener('click', (e) => {
                    e.preventDefault();
                    openModal(item.id);
                });

                container.appendChild(card);
            });
        })
        .catch(err => console.error('Error loading news:', err));

    // Modal Close Listeners
    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }
    
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    }
});

async function openModal(id) {
    try {
        const response = await fetch('/assets/data/news.json');
        const data = await response.json();
        const newsItem = data.find(item => item.id === id);
        
        if (newsItem) {
            document.getElementById('modal-title').innerText = newsItem.title;
            document.getElementById('modal-full-text').innerHTML = newsItem.full_text;
            
            const imgContainer = document.getElementById('modal-image-container');
            if (imgContainer) {
                imgContainer.innerHTML = '';
                // Add the grid class to the container
                imgContainer.classList.add('news-image-grid'); 

                let imagesToDisplay = Array.isArray(newsItem.images) ? newsItem.images : [];

                    imagesToDisplay.forEach((src, index) => {
                        // 1. Create the link
                        const link = document.createElement('a');
                        link.href = src;
                        link.target = "_blank";
                        
                        // 2. Determine class
                        if (index === 0) {
                            // Hero image: gets the special feature class
                            link.className = newsItem.image_style === 'contain' ? 'feature-contain' : 'feature-fill';
                        } else {
                            // Gallery image: gets the standard image-link class
                            link.className = 'image-link';
                        }

                        // 3. Create the image
                        const img = document.createElement('img');
                        img.src = src;

                        // 4. Assemble
                        link.appendChild(img);
                        imgContainer.appendChild(link);
                    });
                            }
            document.getElementById('news-modal').style.display = 'block';
        }
    } catch (err) {
        console.error("Modal failed to open:", err);
    }
}

function closeModal() {
    document.getElementById('news-modal').style.display = 'none';
}