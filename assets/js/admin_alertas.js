document.addEventListener('DOMContentLoaded', function() {
    // Funcionalidad para los switches de alerta
    const alertSwitches = document.querySelectorAll('.switch input');
    alertSwitches.forEach(switchEl => {
        switchEl.addEventListener('change', function() {
            const alertaId = this.closest('tr').querySelector('td:first-child').textContent;
            const isActive = this.checked;
            console.log(`Alerta ${alertaId} ${isActive ? 'activada' : 'desactivada'}`);
            // Aquí iría el código para enviar la actualización al servidor
        });
    });

    // Funcionalidad para los botones de edición
    const editButtons = document.querySelectorAll('.action-button');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const alertaId = this.closest('tr').querySelector('td:first-child').textContent;
            console.log(`Editando alerta ${alertaId}`);
            // Aquí iría el código para abrir un modal de edición o redirigir a una página de edición
        });
    });

    // Funcionalidad para la barra de búsqueda
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('.alertas-table tbody tr');
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});