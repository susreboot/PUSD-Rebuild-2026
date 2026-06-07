// /assets/js/search.js

document.addEventListener('input', function(e) {
    if (e.target && e.target.id === 'search-input') {
        const query = e.target.value.toLowerCase();
        const container = document.getElementById('search-results');

        if (query.length < 3) {
            container.innerHTML = '';
            return;
        }

        fetch('/assets/data/search-index.json')
            .then(response => response.json())
            .then(data => {
                const matches = data.filter(item => 
                    (item.title && item.title.toLowerCase().includes(query)) || 
                    (item.text && item.text.toLowerCase().includes(query))
                );
                
                // Render the results
                container.innerHTML = '';
                if (matches.length === 0) {
                    container.innerHTML = '<div style="padding: 10px; color: #888;">No results found.</div>';
                } else {
                    matches.forEach(item => {
                        const div = document.createElement('div');
                        div.style.padding = '12px';
                        div.style.borderBottom = '1px solid #eee';
                        div.style.cursor = 'pointer';
                        div.innerHTML = `<strong>${item.title}</strong><div style="font-size: 12px; color: #777;">${item.text.substring(0, 50)}...</div>`;
                        div.onclick = () => window.location.href = item.link;
                        container.appendChild(div);
                    });
                }
            })
            .catch(err => console.error("Search error:", err));
    }
});