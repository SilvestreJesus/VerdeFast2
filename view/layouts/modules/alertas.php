<?php if (isset($_GET['ok']) && $_GET['ok'] == 1): ?>
    <article id="ok" class="ok">
        <span class="material-symbols-outlined">check</span>
        <p>Sesión iniciada correctamente</p>
    </article>
<?php elseif (isset($_GET['ok']) && $_GET['ok'] == 2): ?>
    <article id="ok1" class="ok">
        <span class="material-symbols-outlined">check</span>
        <p>Sesión cerrada correctamente</p>
    </article>
<?php elseif (isset($_GET['ok']) && $_GET['ok'] == 3): ?>
    <article id="ok2" class="ok">
        <span class="material-symbols-outlined">check</span>
        <p>Cuenta creada con éxito</p>
    </article>
<?php elseif (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <article id="error1" class="error">
        <span class="material-symbols-outlined">block</span>
        <p>Faltan campos requeridos</p>
    </article>
<?php elseif (isset($_GET['error']) && $_GET['error'] == 2): ?>
    <article id="error2" class="error">
        <span class="material-symbols-outlined">block</span>
        <p>Correo o contraseña incorrectos</p>
    </article>
<?php elseif (isset($_GET['info']) && $_GET['info'] == 1): ?>
    <article id="info1" class="info">
        <span class="material-symbols-outlined">info</span>
        <p>No has iniciado sesión</p>
    </article>
<?php elseif (isset($_GET['warning']) && $_GET['warning'] == 1): ?>
    <article id="warning1" class="warning">
        <span class="material-symbols-outlined">warning</span>
        <p>No tienes permiso para acceder a ese contenido</p>
    </article>
<?php elseif (isset($_GET['usado']) && $_GET['usado'] == 3): ?>
    <article id="usado" class="error">
        <span class="material-symbols-outlined">block</span>
        <p>Intente Denuevo</p>
    </article>
<?php endif; ?>