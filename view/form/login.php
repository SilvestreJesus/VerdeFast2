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
        <h1>Iniciar sesión</h1>
        <form action="/controller/login.php" class="titulo-inputs" method="post">
            <div class="inputs">
                <fieldset>
                    <input name="correo" type="email" placeholder="Correo electrónico" required>
                    <span class="material-symbols-outlined">email</span>
                </fieldset>
                <fieldset>
                    <input name="pass" type="password" placeholder="Contraseña" required>
                    <span class="material-symbols-outlined">lock</span>
                </fieldset>
            </div>
            <div class="botones">
                <button type="submit" class="iniciar-sesion boton">Iniciar sesión</button>
                <a href="/view/form/registrar_usuario.php?origen=login" id="rg" class="reg-usuario boton-secundario">Regístrate</a>
            </div>
        </form>
        <a href="/view/form/login.php?warning=1" class="a reg-clave">¿Has olvidado tu contraseña?</a>
    </main>
    <a href="/view/form/registrar_usuario.php?origen=login" class="reg-usuario boton-secundario">Regístrate</a>
    <div class="bg"></div>
    <div class="login-bg"></div>
<?php include '../layouts/default/footer.php'; ?>