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
    .then(response => {
        // Check if the response is empty
        return response.text().then(text => {
            if (!text || text.trim() === "") {
                throw new Error("Server returned an empty file!");
            }
            return JSON.parse(text);
        });
    })
    .then(data => {
        // ... your existing filter and display logic ...
    })
    .catch(err => {
        console.error("Search error:", err);
    });
    }
});