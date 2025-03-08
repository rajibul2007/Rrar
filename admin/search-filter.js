document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('q').toLowerCase();
    
    if (searchQuery) {
        const calculators = document.querySelectorAll('.calc-card');
        calculators.forEach(calc => {
            const calcName = calc.dataset.name.toLowerCase();
            calc.style.display = calcName.includes(searchQuery) ? 'block' : 'none';
        });
        
        // Log search tracking
        fetch(`/tracking.php?query=${encodeURIComponent(searchQuery)}`);
    }
});
