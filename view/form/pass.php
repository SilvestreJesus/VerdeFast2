<?php include '../layouts/default/head.php'; ?>
    <link rel="stylesheet" href="/assets/css/form/login.css">
    <title>VerdeFast - Inicia sesión o regístrate</title>
</head>
<body>
<?php include '../layouts/modules/alertas.php'; ?>
    <div class="verdefast">
        <span class="verde">Verde</span><span class="fast">Fast</span>
    </div>
    <main>
        <div class="titulo-inputs">
            <h1>Recuperar contraseña</h1>
            <div class="inputs">
                <fieldset>
                    <input type="text" placeholder="Usuario o correo electrónico">
                    <span class="material-symbols-outlined">person</span>
                </fieldset>
                <fieldset>
                    <input type="password" placeholder="Código de verificación">
                    <span class="material-symbols-outlined">lock</span>
                </fieldset>
            </div>
        </div>
        <div class="botones">
            <a href="/view/main/panel.php?ok=1" class="iniciar-sesion boton">Cambiar contraseña</a>
            <a href="/view/form/registrar_usuario.php" id="rg" class="reg-usuario boton-secundario">Enviar <br> código</a>
        </div>
        <a href="/view/form/login.php?warning=1" class="a reg-clave">Ya recibí un código de verificación</a>
    </main>
    <a href="/view/form/registrar_usuario.php" class="reg-usuario boton-secundario">Enviar código</a>
    <div class="bg"></div>
    <div class="login-bg"></div>
<?php include '../layouts/default/footer.php'; ?>