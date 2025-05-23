<?php include '../layouts/default/head.php'; ?>
    <link rel="stylesheet" href="/assets/css/form/selec_planta.css">
    <title>VerdeFast - Seleccione Sembradío</title>
</head>
<body>
<?php include '../layouts/modules/alertas.php'; ?>

    <main class="main-content">
        <h1 class="title">Selecciona un sembradío</h1>
        <div class="sembradio-list">
            <div class="sembradio-item">
                <div class="sembradio-icon">
                    🥔
                </div>
                <div class="sembradio-info">
                    <h2 class="sembradio-name">Sembradio Papa</h2>
                    <p class="sembradio-density">Densidad: 100m*20m</p>
                </div>
            </div>
            
            <div class="sembradio-item">
                <div class="sembradio-icon">
                    🍅
                </div>
                <div class="sembradio-info">
                    <h2 class="sembradio-name">Sembradio Tomate</h2>
                    <p class="sembradio-density">Densidad: 10m*10m</p>
                </div>
            </div>
            
            <div class="sembradio-item">
                <div class="sembradio-icon">
                    🌽
                </div>
                <div class="sembradio-info">
                    <h2 class="sembradio-name">Sembradio Maiz</h2>
                    <p class="sembradio-density">Densidad: 200m*100m</p>
                </div>
            </div>
        </div>
    </main>
    <script>
document.querySelectorAll('.sembradio-item').forEach(item => {
  item.addEventListener('click', () => {
    const icono = item.querySelector('.sembradio-icon').textContent.trim();
    const nombre = item.querySelector('.sembradio-name').textContent.trim();
    const densidad = item.querySelector('.sembradio-density').textContent.trim();

    // Guardar datos en localStorage
    localStorage.setItem('sembradioSeleccionado', JSON.stringify({
      icono,
      nombre,
      densidad
    }));

    // Redirigir al panel principal
    window.location.href = '/view/main/panel.php'; // Cambia esta ruta según corresponda
  });
});
</script>

</body>
</html>