<?php 
session_start(); 
include '../layouts/default/head.php'; 
?>

<link rel="stylesheet" href="/assets/css/tecnico/registro_planta.css">

<script src="/assets/js/plantas.js" defer></script>

<title>VerdeFast - Registro Planta</title>
</head>
<body>

<?php include '../layouts/modules/alertas.php'; ?>
<?php include '../layouts/modules/nav_btns.php'; ?>
<?php include '../layouts/modules/header.php'; ?>

<main class="registro-container">
    <div class="titulo">
        <h1 class="titulo">Registrar Planta</h1>
        <span class="material-symbols-outlined deg-primario">psychiatry</span>
    </div>

    <form class="formulario" action="/controller/registrar_planta.php" method="POST">

        <fieldset class="campo">
            <label for="correo" class="etiqueta">Correo del Cliente</label>
            <input type="email" id="correo" name="correo" class="input" placeholder="luismi.delavega@ejemplo.mx" required>
        </fieldset>

        <fieldset class="campo">
            <label for="telefono" class="etiqueta">Telefono del Cliente</label>
            <input type="tel" id="telefono" name="telefono" class="input" 
                placeholder="1234567890" 
                maxlength="10"
                pattern="\d{10}" 
                title="Debe contener exactamente 10 dígitos numéricos"
                required>
        </fieldset>
        <fieldset class="campo">
            <label for="nombre_planta" class="etiqueta">Nombre de la Planta</label>
            <select id="nombre_planta" name="nombre_planta" class="input" required>
                <option value="" disabled selected>Seleccione</option>
            </select>  
        </fieldset>

        <fieldset class="campo">
            <label for="tipo" class="etiqueta">Tipo</label>
            <input type="text" id="tipo" name="tipo" class="input" placeholder="Tipo" readonly required>
        </fieldset>

        <fieldset class="campo">
            <label for="familia" class="etiqueta">Familia</label>
            <input type="text" id="familia" name="familia" class="input" placeholder="Familia" readonly required>
        </fieldset>


        <fieldset class="campo">
            <label for="cantidad" class="etiqueta">Cantidad Cultivo</label>
            <input type="cantidad" id="cantidad" name="cantidad" class="input" placeholder="40" required>
        </fieldset>
        <fieldset class="campo">
            <label for="tamaño_largo" class="etiqueta">Tamaño de la densidad de largo</label>
            <input type="tamaño_largo" id="tamaño_largo" name="tamaño_largo" class="input" placeholder="100" required>
        </fieldset>
        <fieldset class="campo">
            <label for="tamaño_ancho" class="etiqueta">Tamaño de la densidad de ancho</label>
            <input type="tamaño_ancho" id="tamaño_ancho" name="tamaño_ancho" class="input" placeholder="100" required>
        </fieldset>

        <button type="submit" class="registrarse boton">Añadir Planta</button>
    </form>
</main>

<?php include '../layouts/default/footer.php'; ?>













