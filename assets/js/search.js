document.addEventListener('DOMContentLoaded', function () {

  const searchInput = document.getElementById('search-input');
  const searchResults = document.getElementById('search-results');

  if (!searchInput) return; // not on a page with search

  searchInput.addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();

    if (query.length < 3) {
      searchResults.innerHTML = '';
      return;
    }

    fetch('/assets/data/search-index.json')
      .then(res => {
        if (!res.ok) throw new Error('Could not load search index.');
        return res.json();
      })
     .then(data => {
        const matches = data.filter(item =>
            item.title.toLowerCase().includes(query) ||
            (item.text && item.text.toLowerCase().includes(query))
        );

        if (matches.length === 0) {
            searchResults.innerHTML = '<p style="color:#888;font-size:14px;padding:8px 0">No results found.</p>';
            return;
        }

        // Build result elements directly in the DOM — no innerHTML for the cards
        searchResults.innerHTML = ''; // clear first

        matches.forEach(item => {
            const a = document.createElement('a');
            a.href = item.link;
            a.style.cssText = 'display:block;padding:10px 12px;border-radius:7px;text-decoration:none;color:inherit;margin-bottom:4px;border:0.5px solid #eee;background:white';
            a.onmouseover = () => a.style.background = '#f4f6f8';
            a.onmouseout  = () => a.style.background = 'white';

            const title = document.createElement('div');
            title.style.cssText = 'font-size:14px;font-weight:600;color:#0a3055';
            title.textContent = item.title;

            const snippet = document.createElement('div');
            snippet.style.cssText = 'font-size:12px;color:#5a6a7a;margin-top:2px';
            snippet.textContent = item.text ? item.text.substring(0, 120) + '...' : '';

            a.appendChild(title);
            if (item.text) a.appendChild(snippet);
            searchResults.appendChild(a);
        });
    })
      .catch(err => {
        console.error('Search error:', err);
        searchResults.innerHTML = '<p style="color:#c00;font-size:13px;padding:8px 0">Search unavailable. Please try again.</p>';
      });
  });

  // Close on Escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.getElementById('search-overlay').style.display = 'none';
    }
  });

  // Highlight matching text
  function highlight(text, query) {
    const escaped = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    return text.replace(new RegExp(`(${escaped})`, 'gi'),
      '<mark style="background:#fff3cc;border-radius:2px;padding:0 1px">$1</mark>');
  }

});