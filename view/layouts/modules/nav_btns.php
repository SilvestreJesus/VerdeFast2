<?php if (isset($_GET['origen'])): ?>
    <nav class="nav_btns">
        <?php if (isset($_GET['origen']) && $_GET['origen'] == "login"): ?>
            <a href="/view/form/login.php" class="volver a">
                <span class="material-symbols-outlined">arrow_back</span>
                <p>Volver al inicio de sesión</p>
            </a>
        <?php elseif (isset($_GET['origen']) && $_GET['origen'] == "index"): ?>
            <a href="/view/main/index.php" class="volver a">
                <span class="material-symbols-outlined">arrow_back</span>
                <p>Volver al inicio</p>
            </a>
        <?php elseif (isset($_GET['origen']) && $_GET['origen'] == "test"): ?>

        <?php endif; ?>
    </nav>
<?php endif; ?>