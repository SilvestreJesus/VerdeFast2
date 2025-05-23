<header class="header">
    <div class="logo">
        <span class="verde">Verde</span><span class="fast">Fast</span>
    </div>
    <?php session_start(); ?>
    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'cliente'): ?>

        <nav class="nav">
        <ul>
            <li>
                <a href="/view/main/panel.php" class="a nav-item">
                    <span class="material-symbols-outlined">home</span>
                    Panel
                </a>
            </li>
            <li>
                <a href="/view/extra/bitacora.php" class="a nav-item">
                    <span class="material-symbols-outlined">news</span>
                    Bitácoras
                </a>
            </li>
            <li>
                <a href="/view/extra/configuracion.php" class="a nav-item">
                    <span class="material-symbols-outlined">settings</span>
                    Configuración
                </a>
            </li>
            <li>
                <a href="/view/main/perfil.php" class="a nav-item">
                    <span class="material-symbols-outlined">person</span>
                    Perfil
                </a>
            </li>
        </ul>
    </nav>
    <?php endif; ?>
</header>