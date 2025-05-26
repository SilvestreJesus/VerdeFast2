document.addEventListener('DOMContentLoaded', function () {
    // Funcionalidad para la barra de búsqueda
    const searchInput = document.querySelector('.search-input');
    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const perfilCards = document.querySelectorAll('.perfil-card');

        perfilCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });

    // Funcionalidad para agregar un nuevo perfil
    function addNewProfile() {
        const perfilesList = document.querySelector('.perfiles-list');
        const newCard = document.createElement('div');
        newCard.className = 'perfil-card';
        newCard.innerHTML = `
            <div class="perfil-info">
                <div class="info-row">
                    <div class="info-field"><div class="field-label">Nombre</div><div class="field-value"></div></div>
                    <div class="info-field"><div class="field-label">Apellidos</div><div class="field-value"></div></div>
                    <div class="info-field"><div class="field-label">Fecha de Nacimiento</div><div class="field-value"></div></div>
                    <div class="info-field"><div class="field-label">Genero</div><div class="field-value"></div></div>
                    <div class="info-field"><div class="field-label">Telefono</div><div class="field-value"></div></div>
                    <div class="info-field"><div class="field-label">Rol</div><div class="field-value"></div></div>
                </div>
                <div class="info-row">
                    <div class="info-field full-width"><div class="field-label">Domicilio</div><div class="field-value"></div></div>
                    
                    <div class="info-field"><div class="field-label">Correo</div><div class="field-value"></div></div>
                </div>
            </div>
        `;

        perfilesList.appendChild(newCard);
        editProfile(newCard);
    }

    // Editar perfil (convertir campos a inputs)
    function editProfile(card) {
        const fields = card.querySelectorAll('.field-value');

        fields.forEach(field => {
            const labelText = field.parentElement.querySelector('.field-label').textContent.trim().toLowerCase();

            let input;
            if (labelText === 'fecha de nacimiento') {
                input = document.createElement('input');
                input.type = 'date';
            } else if (labelText === 'género' || labelText === 'genero') {
                input = document.createElement('select');
                input.innerHTML = `
                    <option value="">Selecciona</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                `;
            } else if (labelText === 'rol') {
                input = document.createElement('select');
                input.innerHTML = `
                    <option value="">Selecciona</option>
                    <option value="administrador">administrador</option>
                    <option value="tecnico">tecnico</option>
                    <option value="cliente">cliente</option>
                `;
            } else {
                input = document.createElement('input');
                input.type = 'text';
            }

            input.className = 'edit-input';
            input.value = field.textContent;
            field.innerHTML = '';
            field.appendChild(input);
        });

        // Agregar campo de contraseña (solo en edición)
        const passwordField = document.createElement('div');
        passwordField.className = 'info-field full-width';
        passwordField.innerHTML = `
            <div class="field-label">Contraseña</div>
            <div class="field-value">
                <input type="password" class="edit-input" placeholder="Contraseña">
            </div>
        `;
        card.querySelector('.perfil-info').appendChild(passwordField);

        const buttonsContainer = document.createElement('div');
        buttonsContainer.className = 'edit-buttons';
        buttonsContainer.innerHTML = `
            <button class="save-button">Guardar</button>
            <button class="cancel-button">Cancelar</button>
        `;
        card.appendChild(buttonsContainer);

        buttonsContainer.querySelector('.save-button').addEventListener('click', () => saveProfile(card));
        buttonsContainer.querySelector('.cancel-button').addEventListener('click', () => cancelEdit(card));
    }

    // Guardar perfil
    function saveProfile(card) {
        const inputs = card.querySelectorAll('.edit-input');
        const data = {};

        inputs.forEach(input => {
            const label = input.parentElement.previousElementSibling?.textContent.trim().toLowerCase().replace(/ /g, '');
            if (label) {
                data[label] = input.value;
            }
        });

        // Validación del correo
        if (!data.correo || !data.correo.includes('@')) {
            alert('El correo debe contener un @ válido.');
            return;
        }

        const passwordInput = card.querySelector('input[type="password"]');
        const password = passwordInput ? passwordInput.value : '';

        fetch('/controller/registrar_usuario.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                nombre: data.nombre || '',
                apellidos: data.apellidos || '',
                fechaNacimiento: data.fechadenacimiento || '',
                genero: data.genero || '',
                telefono: data.telefono || '',
                rol: data.rol || '',
                correo: data.correo || '',
                domicilio: data.domicilio || '',
                pass: password || '',

            })
        })
        .then(res => res.json())
        .then(response => {
            if (response.success) {
                location.reload(); // Recarga la vista para ver el nuevo perfil
                return;
                // Reemplazar inputs con texto estático (excepto contraseña)
                inputs.forEach(input => {
                    if (input.type === 'password') return;
                    const value = input.value;
                    const field = input.parentElement;
                    field.innerHTML = value;
                });

                // Eliminar campo de contraseña del DOM
                const passwordLabel = [...card.querySelectorAll('.field-label')]
                    .find(label => label.textContent.trim().toLowerCase() === 'contraseña');
                if (passwordLabel) {
                    passwordLabel.parentElement.parentElement.remove();
                }

                const buttonsContainer = card.querySelector('.edit-buttons');
                if (buttonsContainer) buttonsContainer.remove();
            } else {
                alert('Error al guardar el perfil.');
            }
        })
        .catch(err => {
            console.error('Error al guardar el perfil:', err);
            alert('Error de conexión.');
        });
    }

    // Cancelar edición
    function cancelEdit(card) {
        const inputs = card.querySelectorAll('.edit-input');

        inputs.forEach(input => {
            const originalValue = input.defaultValue;
            const field = input.parentElement;
            field.innerHTML = originalValue;
        });

        // Eliminar campo de contraseña si existe
        const passwordLabel = [...card.querySelectorAll('.field-label')]
            .find(label => label.textContent.trim().toLowerCase() === 'contraseña');
        if (passwordLabel) {
            passwordLabel.parentElement.parentElement.remove();
        }

        const buttonsContainer = card.querySelector('.edit-buttons');
        if (buttonsContainer) buttonsContainer.remove();
    }

    // Botón para agregar nuevo perfil
    const mainContent = document.querySelector('.main-content');
    const addButton = document.createElement('button');
    addButton.className = 'add-profile-button';
    addButton.textContent = 'Agregar Perfil';
    addButton.addEventListener('click', addNewProfile);
    mainContent.appendChild(addButton);
});
