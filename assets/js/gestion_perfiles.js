document.addEventListener('DOMContentLoaded', function() {
    // Funcionalidad para la barra de búsqueda
    const searchInput = document.querySelector('.search-input');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const perfilCards = document.querySelectorAll('.perfil-card');
        
        perfilCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Datos de ejemplo para los perfiles
    const dummyData = [
        {
            nombre: 'Juan',
            apellidos: 'Pérez García',
            fechaNacimiento: '15/05/1985',
            genero: 'Masculino',
            telefono: '123-456-7890',
            correo: 'juan.perez@example.com',
            domicilio: 'Calle Principal 123, Ciudad'
        },
        {
            nombre: 'María',
            apellidos: 'López Rodríguez',
            fechaNacimiento: '22/09/1990',
            genero: 'Femenino',
            telefono: '987-654-3210',
            correo: 'maria.lopez@example.com',
            domicilio: 'Avenida Central 456, Ciudad'
        },
        {
            nombre: 'Carlos',
            apellidos: 'González Martínez',
            fechaNacimiento: '10/12/1978',
            genero: 'Masculino',
            telefono: '555-123-4567',
            correo: 'carlos.gonzalez@example.com',
            domicilio: 'Plaza Mayor 789, Ciudad'
        }
    ];
    
    // Función para cargar los perfiles
    function loadProfiles() {
        console.log('Cargando perfiles...');
        
        const perfilCards = document.querySelectorAll('.perfil-card');
        
        perfilCards.forEach((card, index) => {
            if (index < dummyData.length) {
                const data = dummyData[index];
                
                // Obtener todos los campos de valor en la tarjeta
                const nombreField = card.querySelector('.info-field:nth-child(1) .field-value');
                const apellidosField = card.querySelector('.info-field:nth-child(2) .field-value');
                const fechaNacimientoField = card.querySelector('.info-field:nth-child(3) .field-value');
                const generoField = card.querySelector('.info-field:nth-child(4) .field-value');
                const telefonoField = card.querySelector('.info-field:nth-child(5) .field-value');
                const correoField = card.querySelector('.info-field:nth-child(6) .field-value');
                const domicilioField = card.querySelector('.full-width .field-value');
                
                // Asignar los valores a los campos
                nombreField.textContent = data.nombre;
                apellidosField.textContent = data.apellidos;
                fechaNacimientoField.textContent = data.fechaNacimiento;
                generoField.textContent = data.genero;
                telefonoField.textContent = data.telefono;
                correoField.textContent = data.correo;
                domicilioField.textContent = data.domicilio;
                
                // Añadir clase para indicar que el campo tiene datos
                card.querySelectorAll('.field-value').forEach(field => {
                    if (field.textContent.trim() !== '') {
                        field.classList.add('has-data');
                    }
                });
            }
        });
    }
    
    // Cargar perfiles al iniciar la página
    loadProfiles();
    
    // Funcionalidad para agregar un nuevo perfil
    function addNewProfile() {
        console.log('Agregando nuevo perfil...');
        
        // Crear un nuevo objeto de perfil
        const newProfile = {
            nombre: '',
            apellidos: '',
            fechaNacimiento: '',
            genero: '',
            telefono: '',
            correo: '',
            domicilio: ''
        };
        
        // Añadir el nuevo perfil a los datos
        dummyData.push(newProfile);
        
        // Crear una nueva tarjeta de perfil
        const perfilesList = document.querySelector('.perfiles-list');
        const newCard = document.createElement('div');
        newCard.className = 'perfil-card';
        newCard.innerHTML = `
            <div class="perfil-info">
                <div class="info-row">
                    <div class="info-field">
                        <div class="field-label">Nombre</div>
                        <div class="field-value"></div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Apellidos</div>
                        <div class="field-value"></div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Fecha de Nacimiento</div>
                        <div class="field-value"></div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Genero</div>
                        <div class="field-value"></div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Telefono</div>
                        <div class="field-value"></div>
                    </div>
                    <div class="info-field">
                        <div class="field-label">Correo</div>
                        <div class="field-value"></div>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-field full-width">
                        <div class="field-label">Domicilio</div>
                        <div class="field-value"></div>
                    </div>
                </div>
            </div>
        `;
        
        perfilesList.appendChild(newCard);
        
        // Abrir formulario de edición para el nuevo perfil
        editProfile(dummyData.length - 1);
    }
    
    // Funcionalidad para editar un perfil
    function editProfile(profileIndex) {
        console.log(`Editando perfil ${profileIndex}...`);
        
        const perfilCards = document.querySelectorAll('.perfil-card');
        const card = perfilCards[profileIndex];
        
        if (card) {
            // Obtener todos los campos de valor en la tarjeta
            const nombreField = card.querySelector('.info-field:nth-child(1) .field-value');
            const apellidosField = card.querySelector('.info-field:nth-child(2) .field-value');
            const fechaNacimientoField = card.querySelector('.info-field:nth-child(3) .field-value');
            const generoField = card.querySelector('.info-field:nth-child(4) .field-value');
            const telefonoField = card.querySelector('.info-field:nth-child(5) .field-value');
            const correoField = card.querySelector('.info-field:nth-child(6) .field-value');
            const domicilioField = card.querySelector('.full-width .field-value');
            
            // Convertir los campos a inputs editables
            convertToInput(nombreField, dummyData[profileIndex].nombre, 'nombre', profileIndex);
            convertToInput(apellidosField, dummyData[profileIndex].apellidos, 'apellidos', profileIndex);
            convertToInput(fechaNacimientoField, dummyData[profileIndex].fechaNacimiento, 'fechaNacimiento', profileIndex);
            convertToInput(generoField, dummyData[profileIndex].genero, 'genero', profileIndex);
            convertToInput(telefonoField, dummyData[profileIndex].telefono, 'telefono', profileIndex);
            convertToInput(correoField, dummyData[profileIndex].correo, 'correo', profileIndex);
            convertToInput(domicilioField, dummyData[profileIndex].domicilio, 'domicilio', profileIndex);
            
            // Añadir botones de guardar y cancelar
            const buttonsContainer = document.createElement('div');
            buttonsContainer.className = 'edit-buttons';
            buttonsContainer.innerHTML = `
                <button class="save-button" data-profile-index="${profileIndex}">Guardar</button>
                <button class="cancel-button" data-profile-index="${profileIndex}">Cancelar</button>
            `;
            card.appendChild(buttonsContainer);
            
            // Añadir eventos a los botones
            const saveButton = card.querySelector('.save-button');
            const cancelButton = card.querySelector('.cancel-button');
            
            saveButton.addEventListener('click', function() {
                const index = this.getAttribute('data-profile-index');
                saveProfile(index);
            });
            
            cancelButton.addEventListener('click', function() {
                const index = this.getAttribute('data-profile-index');
                cancelEdit(index);
            });
        }
    }
    
    // Función para convertir un campo a input editable
    function convertToInput(field, value, fieldName, profileIndex) {
        const input = document.createElement('input');
        input.type = 'text';
        input.value = value;
        input.className = 'edit-input';
        input.setAttribute('data-field', fieldName);
        input.setAttribute('data-profile-index', profileIndex);
        
        field.innerHTML = '';
        field.appendChild(input);
    }
    
    // Función para guardar los cambios de un perfil
    function saveProfile(profileIndex) {
        console.log(`Guardando perfil ${profileIndex}...`);
        
        const perfilCards = document.querySelectorAll('.perfil-card');
        const card = perfilCards[profileIndex];
        
        if (card) {
            // Obtener todos los inputs
            const inputs = card.querySelectorAll('.edit-input');
            
            // Actualizar los datos
            inputs.forEach(input => {
                const fieldName = input.getAttribute('data-field');
                dummyData[profileIndex][fieldName] = input.value;
            });
            
            // Eliminar los botones de edición
            const buttonsContainer = card.querySelector('.edit-buttons');
            if (buttonsContainer) {
                buttonsContainer.remove();
            }
            
            // Recargar los perfiles para mostrar los cambios
            loadProfiles();
        }
    }
    
    // Función para cancelar la edición de un perfil
    function cancelEdit(profileIndex) {
        console.log(`Cancelando edición del perfil ${profileIndex}...`);
        
        const perfilCards = document.querySelectorAll('.perfil-card');
        const card = perfilCards[profileIndex];
        
        if (card) {
            // Eliminar los botones de edición
            const buttonsContainer = card.querySelector('.edit-buttons');
            if (buttonsContainer) {
                buttonsContainer.remove();
            }
            
            // Recargar los perfiles para mostrar los datos originales
            loadProfiles();
        }
    }
    
    // Funcionalidad para eliminar un perfil
    function deleteProfile(profileIndex) {
        console.log(`Eliminando perfil ${profileIndex}...`);
        
        // Eliminar el perfil de los datos
        dummyData.splice(profileIndex, 1);
        
        // Eliminar la tarjeta del DOM
        const perfilCards = document.querySelectorAll('.perfil-card');
        const card = perfilCards[profileIndex];
        
        if (card) {
            card.remove();
        }
    }
    
    // Añadir botón para agregar nuevo perfil
    const mainContent = document.querySelector('.main-content');
    const addButton = document.createElement('button');
    addButton.className = 'add-profile-button';
    addButton.textContent = 'Agregar Perfil';
    addButton.addEventListener('click', addNewProfile);
    mainContent.appendChild(addButton);
});