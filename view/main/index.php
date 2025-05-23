<?php include '../layouts/default/head.php'; ?>
    <link rel="stylesheet" href="/assets/css/main/index.css">
    <title>VerdeFast</title>
</head>
<body>
<?php include '../layouts/modules/alertas.php'; ?>
    <article class="landing-container">
        <h1 class="verdefast">Bienvenido a <span class="verde">Verde</span><span class="fast">Fast</span></h1>
        <div class="landing-desktop">
            <section class="dato">
                <div class="iconos">
                    <span class="material-symbols-outlined">nature</span>
                    <span class="material-symbols-outlined">bolt</span>
                    <span class="material-symbols-outlined">speed</span>
                </div>
                <p>VerdeFast es un sistema automatizado que utiliza pulsos mioeléctricos de baja intensidad para acelerar el crecimiento de cultivos, reduciendo hasta un 40% los costos de insumos agrícolas tradicionales.</p>
            </section>
            <p class="pruebalo-ya">¿Ya lo probaste?</p>
            <div class="botones">
                <a href="/view/form/login.php" class="boton">Inicia sesión</a>
                <a href="/view/form/registrar_usuario.php?origen=index" class="boton-secundario">Regístrate</a>
            </div>
        </div>
        <div class="landing-bg"></div>
    </article>
<?php include '../layouts/default/footer.php'; ?>