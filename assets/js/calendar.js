document.addEventListener('DOMContentLoaded', () => {
    // Colors centralized here
    const colorMap = {
        'holiday': '#e74c3c',      // Red
        'professional': '#3498db', // Blue
        'meeting': '#2ecc71',      // Green
        'academic': '#9b59b6',     // Purple
        'default': '#95a5a6'       // Grey
    };

    fetch('/assets/data/calendar.json')
        .then(response => response.json())
        .then(events => {
            const container = document.getElementById('calendar-container');
            container.className = 'calendar-grid'; // Apply grid layout class
            
            // Map the events to HTML cards
            container.innerHTML = events.map(event => {
                const eventColor = colorMap[event.type] || colorMap['default'];
                
                return `
                    <div class="calendar-card" style="border-left: 6px solid ${eventColor}">
                        <div class="card-date">${formatDate(event.date)}</div>
                        <div class="card-title">${event.title}</div>
                        <div style="font-size: 0.7rem; color: ${eventColor}; text-transform: uppercase; margin-top: 10px; font-weight: bold;">
                            ${event.type}
                        </div>
                    </div>
                `;
            }).join('');
        });
});

// Helper to format date
function formatDate(dateString) {
    const options = { month: 'short', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-US', options);
}