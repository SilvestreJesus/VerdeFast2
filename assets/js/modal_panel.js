document.addEventListener('DOMContentLoaded', () => {
        const data = localStorage.getItem('sembradioSeleccionado');
        if (data) {
          const { icono, nombre, densidad } = JSON.parse(data);
          document.getElementById('sembradioNombre').textContent = nombre;
          document.getElementById('sembradioDensidad').textContent = densidad;
          document.getElementById('sembradioIcono').innerHTML = `<p style="font-size: 100px;">${icono}</p>`;
        }

    const modal = document.getElementById('contenedor-modal');
    const cuerpoModal = document.getElementById('cuerpo-modal');
    const btnCerrar = document.querySelector('.boton-cerrar');

    // Función para abrir un modal y cargar contenido de otra página
    function abrirModal(url) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                cuerpoModal.innerHTML = html;
                modal.classList.remove('oculto');
    
                // 👉 Volver a agregar el event listener a los elementos del modal cargado
                const items = cuerpoModal.querySelectorAll('.sembradio-item');
                items.forEach(item => {
                    item.addEventListener('click', () => {
                        const icono = item.querySelector('.sembradio-icon').textContent.trim();
                        const nombre = item.querySelector('.sembradio-name').textContent.trim();
                        const densidad = item.querySelector('.sembradio-density').textContent.trim();
    
                        // Guardar en localStorage
                        localStorage.setItem('sembradioSeleccionado', JSON.stringify({
                            icono,
                            nombre,
                            densidad
                        }));
    
                        // Actualizar dinámicamente el panel
                        document.getElementById('sembradioNombre').textContent = nombre;
                        document.getElementById('sembradioDensidad').textContent = densidad;
                        document.getElementById('sembradioIcono').innerHTML = `<p style="font-size: 100px;">${icono}</p>`;
    
                        // Cerrar el modal
                        modal.classList.add('oculto');
                        cuerpoModal.innerHTML = '';
                    });
                });
            })
            .catch(error => {
                cuerpoModal.innerHTML = `<p>Error al cargar contenido.</p>`;
                modal.classList.remove('oculto');
                console.error(error);
            });
    }
    

    // Cerrar modal
    btnCerrar.addEventListener('click', () => {
        modal.classList.add('oculto');
        cuerpoModal.innerHTML = '';
    });

    // Botón que abre el modal
    const launchBtn = document.getElementById('modal-selec-planta');
    if (launchBtn) {
        launchBtn.addEventListener('click', () => {
            abrirModal('/view/form/selec_planta.php');
        });
    }

});