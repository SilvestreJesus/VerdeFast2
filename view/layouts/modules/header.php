<header class="header">
    <div class="logo">
        <span class="verde">Verde</span><span class="fast">Fast</span>
    </div>
    <?php session_start(); ?>
    <?php if (isset($_SESSION['rol'])): ?>
        <nav class="nav">
            <ul>
                <?php if ($_SESSION['rol'] === 'cliente'): ?>
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
                <?php elseif ($_SESSION['rol'] === 'tecnico'): ?>
                    <li>
                        <a href="/view/tecnico/panel.php" class="a nav-item">
                            <span class="material-symbols-outlined">dashboard</span>
                            Panel Técnico
                        </a>
                    </li>
                    <li>
                        <a href="/view/tecnico/bitacoras.php" class="a nav-item">
                            <span class="material-symbols-outlined">edit_note</span>
                            Bitácoras
                        </a>
                    </li>
                    <li>
                        <a href="/view/tecnico/perfil.php" class="a nav-item">
                            <span class="material-symbols-outlined">person</span>
                            Perfil
                        </a>
                    </li>
                <?php elseif ($_SESSION['rol'] === 'administrador'): ?>
                    <li>
                        <a href="/view/form/registrar_usuario.php" class="a nav-item">
                            <span class="material-symbols-outlined">admin_panel_settings</span>
                            Registro Técnico
                        </a>
                    </li>
                    <li>
                        <a href="/view/admin/gestion_perfiles.php" class="a nav-item">
                            <span class="material-symbols-outlined">group</span>
                            Usuarios
                        </a>
                    </li>
                    <li>
                        <a href="/view/admin/alertas.php" class="a nav-item">
                            <span class="material-symbols-outlined">settings</span>
                            Alertas
                        </a>
                    </li>
                    <li>
                        <a href="/view/main/perfil.php" class="a nav-item">
                            <span class="material-symbols-outlined">person</span>
                            Perfil
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
</header>
