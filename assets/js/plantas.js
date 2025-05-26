document.addEventListener('DOMContentLoaded', () => {
    const nombreSelect = document.getElementById('nombre_planta');
    const tipoInput = document.getElementById('tipo');
    const familiaInput = document.getElementById('familia');

    const plantas = [
        { nombre: 'Lechuga', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Zanahoria', tipo: 'Tubercular', familia: 'Herbáceas' },
        { nombre: 'Espinaca', tipo: 'Capilar', familia: 'Hierbas' },
        { nombre: 'Pepino', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Tomate', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Cebolla', tipo: 'Rizoma', familia: 'Hierbas' },
        { nombre: 'Ajo', tipo: 'Rizoma', familia: 'Hierbas' },
        { nombre: 'Coliflor', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Brócoli', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Repollo', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Apio', tipo: 'Capilar', familia: 'Hierbas' },
        { nombre: 'Rábano', tipo: 'Tubercular', familia: 'Herbáceas' },
        { nombre: 'Jícama', tipo: 'Tubercular', familia: 'Herbáceas' },
        { nombre: 'Calabacita', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Nabo', tipo: 'Tubercular', familia: 'Herbáceas' },
        { nombre: 'Chayote', tipo: 'Rizoma', familia: 'Herbáceas' },
        { nombre: 'Berenjena', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Pimiento', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Betabel', tipo: 'Tubercular', familia: 'Herbáceas' },
        { nombre: 'Acelga', tipo: 'Capilar', familia: 'Hierbas' },
        { nombre: 'Ejote', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Alcachofa', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Papa', tipo: 'Tubercular', familia: 'Herbáceas' },
        { nombre: 'Camote', tipo: 'Tubercular', familia: 'Herbáceas' },
        { nombre: 'Yuca', tipo: 'Rizoma', familia: 'Herbáceas' },
        { nombre: 'Elote', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Chícharo', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Col de Bruselas', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Haba', tipo: 'Capilar', familia: 'Herbáceas' },
        { nombre: 'Cilantro', tipo: 'Capilar', familia: 'Hierbas' },
        { nombre: 'Perejil', tipo: 'Capilar', familia: 'Hierbas' },
        { nombre: 'Cebollín', tipo: 'Rizoma', familia: 'Hierbas' },
        { nombre: 'Hinojo', tipo: 'Capilar', familia: 'Hierbas' },
        { nombre: 'Porro', tipo: 'Rizoma', familia: 'Hierbas' },
        { nombre: 'Hierba buena', tipo: 'Capilar', familia: 'Hierbas' },
        { nombre: 'Rúcula', tipo: 'Capilar', familia: 'Hierbas' }
    ];

    function llenarNombreSelect() {
        nombreSelect.innerHTML = '<option value="" disabled selected>Seleccione</option>';
        plantas.forEach(planta => {
            const opt = document.createElement('option');
            opt.value = planta.nombre;
            opt.textContent = planta.nombre;
            nombreSelect.appendChild(opt);
        });
    }

    nombreSelect.addEventListener('change', () => {
        const seleccionada = plantas.find(p => p.nombre === nombreSelect.value);
        if (seleccionada) {
            tipoInput.value = seleccionada.tipo;
            familiaInput.value = seleccionada.familia;
        }
    });

    llenarNombreSelect();
});
