document.addEventListener('DOMContentLoaded', function() {
    // Funcionalidad para los dropdowns
    const dropdowns = document.querySelectorAll('.filter-dropdown');
    
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function() {
            // Aquí se implementaría la lógica para mostrar las opciones del dropdown
            console.log(`Dropdown ${this.querySelector('span:first-child').textContent} clicked`);
        });
    });

    // Funcionalidad para la barra de búsqueda
    const searchInput = document.querySelector('.search-input');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const bitacoraItems = document.querySelectorAll('.bitacora-item');
        
        bitacoraItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Funcionalidad para cargar más entradas de bitácora (si fuera necesario)
    function loadMoreEntries() {
        // Aquí se implementaría la lógica para cargar más entradas mediante AJAX
        console.log('Cargando más entradas...');
    }

    // Detectar cuando el usuario llega al final de la página para cargar más entradas
    window.addEventListener('scroll', function() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
            loadMoreEntries();
        }
    });
});