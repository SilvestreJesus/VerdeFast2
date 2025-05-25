<?php include '../layouts/default/head.php'; ?>
    <link rel="stylesheet" href="/assets/css/form/registrar_usuario.css">
    <title>VerdeFast - Registrate</title>
</head>
<body>
<?php include '../layouts/modules/alertas.php'; ?>
<?php include '../layouts/modules/nav_btns.php'; ?>
<?php include '../layouts/modules/header.php'; ?>
    <main class="registro-container">
        <div class="titulo">
            <h1 class="titulo">Añadir técnico</h1>
            <span class="material-symbols-outlined deg-primario">account_circle</span>
        </div>
        <form class="formulario" action="/controller/registrar_usuario.php" method="POST">
            <fieldset class="campo">
                <label for="nombre" class="etiqueta">Nombre(s)</label>
                <input type="text" id="nombre" name="nombre" class="input" placeholder="Luis Miguel" required>
            </fieldset>
            <fieldset class="campo">
                <label for="apellidos" class="etiqueta">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="input" placeholder="Rodríguez de la Vega" required>
            </fieldset>
            <fieldset class="campo">
                <label for="fecha_nacimiento" class="etiqueta">Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="input" required>
            </fieldset>
            <fieldset class="campo">
                <label for="genero" class="etiqueta">Genero</label>
                <select id="genero" name="genero" class="input" required>
                    <option value="" class="o1" disabled selected>Selecciona uno</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                    <option value="no-especificar">Prefiero no especificar</option>
                </select>
            </fieldset>
            <fieldset class="campo">
                <label for="telefono" class="etiqueta">Número de teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="input" 
                placeholder="1234567890" 
                maxlength="10"
                pattern="\d{10}" 
                title="Debe contener exactamente 10 dígitos numéricos"
                required>
            </fieldset>
            <fieldset class="campo campo-completo">
                <label for="domicilio" class="etiqueta">Domicilio</label>
                <textarea id="domicilio" name="domicilio" class="input" placeholder="Calle, número, código postal..." required></textarea>
            </fieldset>
            <fieldset class="campo">
                <label for="correo" class="etiqueta">Correo electrónico</label>
                <input type="email" id="correo" name="correo" class="input" placeholder="luismi.delavega@ejemplo.mx" required>
            </fieldset>
            <fieldset class="campo">
                <label for="pass" class="etiqueta">Contraseña</label>
                <input type="password" id="pass" name="pass" class="input"
                    pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$"
                    title="La contraseña debe tener al menos 8 caracteres, una letra mayúscula, un número y un carácter especial."
                    placeholder="**********" required>
            </fieldset>
            <input  id="rol" type="hidden" name="rol" value="cliente">


            <button type="submit" class="registrarse boton">Regístrate</button>
        </form>
    </main>
<?php include '../layouts/default/footer.php'; ?>