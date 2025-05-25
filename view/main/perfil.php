<?php include '../layouts/default/head.php'; ?>
    <link rel="stylesheet" href="/assets/css/main/perfil.css">
    <link rel="icon" type="image/x-icon" href="/assets/img/icono-verdefast.png" />
    <title>VerdeFast - Perfil</title>
</head>
<body>

<?php
session_start();
include '../../controller/modules/alertas.php';

// Solo uno de los siguientes headers según el rol
switch ($_SESSION['rol']) {
    case 'cliente':
        include '../layouts/modules/header.php';
        break;
    case 'tecnico':
        include '../layouts/modules/header.php';
        break;
    case 'administrador':
        include '../layouts/modules/header.php';
        break;
    default:
        header("Location: /view/auth/login.php");
        exit;
}

// Obtener datos del usuario
require_once '../../controller/usuarios.php';
$controlador = new ControladorUsuarios();
$usuario = $controlador->ver($_SESSION['usuario_id']);
?>

<main class="registro-container">
    <div class="icon-container">
        <img src="/assets/img/icono.png" alt="Icono" class="icon">
    </div>

    <form class="formulario" action="/controller/crud/registrar_usuario.php" method="POST">
        <div class="campo">
            <label for="nombres" class="etiqueta">Nombre(s)</label>
            <input type="text" id="nombre" name="nombre" class="input" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
        </div>

        <div class="campo">
            <label for="apellidos" class="etiqueta">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="input" value="<?= htmlspecialchars($usuario['apellidos']) ?>" required>
        </div>

        <div class="campo">
            <label for="correo" class="etiqueta">Correo</label>
            <input type="text" id="correo" name="correo" class="input" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
        </div>

        <div class="campo">
            <label for="telefono" class="etiqueta">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="input" value="<?= htmlspecialchars($usuario['telefono']) ?>" required>
        </div>

        <div class="campo">
            <label for="fecha-nac" class="etiqueta">Fecha de Nacimiento</label>
            <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" class="input" placeholder="dd/mm/aaaa" value="<?= htmlspecialchars($usuario['fecha_nacimiento']) ?>" required>
        </div>

        <div class="campo">
            <label for="genero" class="etiqueta">Género</label>
            <input type="text" id="genero" name="genero" class="input" value="<?= htmlspecialchars($usuario['genero']) ?>" required>
        </div>

        <div class="campo campo-completo">
            <label for="domicilio" class="etiqueta">Domicilio</label>
            <input type="text" id="domicilio" name="domicilio" class="input" value="<?= htmlspecialchars($usuario['domicilio']) ?>" required>
        </div>

        <a href="/controller/logout.php" class="salir boton">Salir</a>
    </form>
</main>

<?php include '../layouts/footer.php'; ?>
