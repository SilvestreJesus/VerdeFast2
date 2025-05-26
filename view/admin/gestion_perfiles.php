<?php
session_start();
require_once __DIR__ . '/../../controller/usuarios.php';

$controlador = new ControladorUsuarios();
$usuarios = $controlador->listar(); // Obtener todos los usuarios
?>

<?php include '../layouts/default/head.php'; ?>
<link rel="stylesheet" href="/assets/css/admin/gestion_perfiles.css">
<title>VerdeFast - Gestión de perfiles</title>
</head>

<body>
<?php include '../layouts/modules/header.php'; ?>
<main class="main-content">
    <div class="perfiles-header">
        <h1>Gestión de perfiles</h1>
        <div class="search-bar">
            <span class="search-icon">🔍</span>
            <input type="text" class="search-input" placeholder="Buscar...">
        </div>
    </div>

    <div class="perfiles-list">
        <?php foreach ($usuarios as $usuario): ?>
            <div class="perfil-card">
                <div class="perfil-info">
                    <div class="info-row">
                        <div class="info-field">
                            <div class="field-label">Nombre</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['nombre']) ?></div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Apellidos</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['apellidos']) ?></div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Fecha de Nacimiento</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['fecha_nacimiento']) ?></div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Género</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['genero']) ?></div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Teléfono</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['telefono']) ?></div>
                        </div>
                        <div class="info-field">
                            <div class="field-label">Rol</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['rol']) ?></div>
                        </div>
                    </div>
                    <div class="info-row">
                        <div class="info-field full-width">
                            <div class="field-label">Domicilio</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['domicilio']) ?></div>
                        </div>
                    </div>
                    <div class="info-field">
                            <div class="field-label">Correo</div>
                            <div class="field-value"><?= htmlspecialchars($usuario['correo']) ?></div>
                    </div>
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include '../layouts/default/footer.php'; ?>
<script src="/assets/js/gestion_perfiles.js"></script>
</body>
</html>
