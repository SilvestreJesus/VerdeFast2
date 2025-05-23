<?php include '../layouts/default/head.php'; ?>
<link rel="stylesheet" href="/assets/css/main/panel.css">
<link rel="stylesheet" href="/assets/css/modules/modal_panel.css">
<script src="/assets/js/modal_panel.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php include '../layouts/modules/header.php'; ?>

<title>VerdeFast - Panel de Control</title>
</head>
<script>
    const isLocal = location.hostname === 'localhost' || location.hostname.startsWith('192.168');
    const BASE_URL_BACKEND = isLocal
        ? 'http://localhost:9400'
        : ' https://dd9a-2806-370-4220-36fd-9f3-ef57-a66d-a9d5.ngrok-free.app';

    const BASE_URL_SENSORES = isLocal
        ? 'http://192.168.188.147'
        : ' https://dd9a-2806-370-4220-36fd-9f3-ef57-a66d-a9d5.ngrok-free.app';

    function actualizarSensores() {
        fetch(`${BASE_URL_SENSORES}/sensores`)
            .then(response => response.json())
            .then(data => {
                console.log("Datos sensores:", data);
                const humedad = parseFloat(data.humedadSuelo);
                document.getElementById('temperatura').textContent = data.temperatura + " °C";
                document.getElementById('humedad').textContent = humedad + "%";
                document.getElementById('ph').textContent = data.ph.toFixed(2);

                const riegoAuto = document.getElementById('riegoauto');
                const estadoRiego = document.getElementById('estado-riego');

                if (riegoAuto && riegoAuto.checked) {
                    const accion = humedad < 12 ? 'activar_riego' : 'desactivar_riego';
                    fetch(`${BASE_URL_BACKEND}/view/extra/configuracion.php?accion=${accion}`)
                        .then(response => response.text())
                        .then(data => {
                            console.log(`Auto-riego (${accion}):`, data);
                            estadoRiego.textContent = `Riego automático ${accion === 'activar_riego' ? 'ACTIVADO' : 'DESACTIVADO'}`;
                            estadoRiego.style.color = accion === 'activar_riego' ? 'green' : 'gray';
                        })
                        .catch(error => console.error(`Error al ${accion.replace('_', ' ')}:`, error));
                }
            })
            .catch(error => console.error('Error al obtener los datos de los sensores:', error));
    }

    function actualizarFechaHora() {
        const ahora = new Date();
        const horas = ahora.getHours().toString().padStart(2, '0');
        const minutos = ahora.getMinutes().toString().padStart(2, '0');
        const ampm = horas >= 12 ? 'pm' : 'am';
        const hora12 = horas % 12 || 12;
        const dia = ahora.getDate().toString().padStart(2, '0');
        const mes = (ahora.getMonth() + 1).toString().padStart(2, '0');
        const anio = ahora.getFullYear();

        const fechaHoraTexto = `${hora12}:${minutos} ${ampm}        ${dia}/${mes}/${anio}`;
        document.querySelector('.date-time').textContent = fechaHoraTexto;
    }

    window.onload = function () {
        actualizarSensores();
        actualizarFechaHora();
        setInterval(actualizarFechaHora, 1000);
        setInterval(actualizarSensores, 1000);

        const btnToggle = document.getElementById('btn-riego-auto');
        const checkbox = document.getElementById('riegoauto');
        btnToggle.addEventListener('click', () => {
            checkbox.checked = !checkbox.checked;
            btnToggle.textContent = checkbox.checked ? 'Desactivar riego automático' : 'Activar riego automático';
            document.getElementById('estado-riego').textContent = checkbox.checked
                ? 'Modo automático activado'
                : 'Modo automático desactivado';
        });
    };
</script>

<body>
    <?php include '../layouts/modules/alertas.php'; ?>
    <?php include '../layouts/modules/modal_panel.php'; ?>
    <main class="main-content">
        <div class="dashboard-grid">
            <div class="metrics-container">
                <pre class="date-time">Cargando fecha...</pre>
                <div class="metrics-grid">
                    <div class="metric-card">
                        <div class="metric-icon">
                            <p style="font-size: 30px;">🌱</p>
                        </div>
                        <div class="metric-value" id="ph">Cargando...</div>
                        <div class="metric-label">pH</div>
                        <div class="metric-change change-positive">+30% que ayer</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon">
                            <p style="font-size: 30px;">🌡️</p>
                        </div>
                        <div class="metric-value" id="temperatura">Cargando...</div>
                        <div class="metric-label">Temperatura</div>
                        <div class="metric-change change-negative">-5% que ayer</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-icon">
                            <p style="font-size: 30px;">💦</p>
                        </div>
                        <div class="metric-value" id="humedad">Cargando...</div>
                        <div class="metric-label">Humedad</div>
                        <div class="metric-change change-negative">-2% que ayer</div>
                    </div>
                </div>
            </div>
            <div class="sembradio-card" id="sembradioCard">
                <div class="sembradio-header">
                    <div class="sembradio-title" id="sembradioNombre">Sembradio Papa <span class="dropdown-icon"></span></div>
                </div>
                <div class="sembradio-density" id="sembradioDensidad">Densidad: 100m*20m</div>
                <div class="papa-icon-container" id="sembradioIcono">
                    <p style="font-size: 100px;">🥔</p>
                </div>

            </div>
            <div class="fenologia-card">
            <h2 class="fenologia-title">Fenología del cultivo</h2>
            <canvas id="fenologiaChart" width="400" height="150"></canvas>
        </div>

        </div>
        <div class="bottom-grid">
            <div class="pronostico-card">
            <h2 class="pronostico-title">Pronóstico de producción</h2>
            <p class="pronostico-subtitle">80 Piezas en la siembra</p>
            <div id="grafica-container" style="
            position: relative;
            width: 360px;
            height: 360px;
            display: flex;
            align-items: center;
            justify-content: center;
        ">
            <canvas id="graficaPastel" style="
                position: absolute;
                top: 50%;
                left: 73%;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 100%;
            "></canvas>
            <div id="porcentaje" style="
                position: absolute;
                top: 50%;
                left: 73%;
                transform: translate(-50%, -50%);
                color: black;
                font-size: 20px;
                font-weight: bold;
            ">0%</div>
        </div>
        </div>




            
            <div class="tamano-card">
                <h2 class="tamano-title">Tamaño de la planta</h2>
                <canvas id="tamanoChart" width="400" height="300"></canvas>
            </div>

        </div>
        <button id="modal-selec-planta">Seleccionar sembradío</button>


        <script>
    // Fenología del cultivo (barras verticales por días)
    const fenologiaCtx = document.getElementById('fenologiaChart').getContext('2d');
    new Chart(fenologiaCtx, {
        type: 'bar',
        data: {
            labels: ['Día 1', 'Día 2', 'Día 3', 'Día 4', 'Día 5', 'Día 6'],
            datasets: [{
                label: 'Etapas fenológicas',
                data: [1, 2, 3, 4, 3, 5], // niveles o estados
                backgroundColor: '#4CAF50'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Nivel de desarrollo'
                    }
                }
            }
        }
    });

    // Tamaño de la planta (barras horizontales por semanas)
    const tamanoCtx = document.getElementById('tamanoChart').getContext('2d');
    new Chart(tamanoCtx, {
        type: 'bar',
        data: {
            labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
            datasets: [{
                label: 'Altura (cm)',
                data: [5, 15, 25, 35],
                backgroundColor: '#4CAF50'
            }]
        },
        options: {
            indexAxis: 'y', // esto hace que las barras sean horizontales
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Altura en cm'
                    }
                }
            }
        }
    });
</script>
<script>
  const ctx = document.getElementById('graficaPastel').getContext('2d');
  const porcentajeTexto = document.getElementById('porcentaje');
  const porcentaje = 66; // puedes ajustar esto dinámicamente

  const data = {
      labels: ['Progreso', 'Resto'],
      datasets: [{
          data: [0, 100],
          backgroundColor: ['#4CAF50', '#ccc'],
          borderWidth: 0,
      }]
  };

  const config = {
      type: 'doughnut',
      data: data,
      options: {
          responsive: true,
          cutout: '70%',
          rotation: -90,
          circumference: 360,
          animation: {
              animateRotate: true,
              duration: 2000,
              onProgress: function(animation) {
                  const current = porcentaje * animation.currentStep / animation.numSteps;
                  data.datasets[0].data[0] = current;
                  data.datasets[0].data[1] = 100 - current;
                  porcentajeTexto.textContent = `${Math.round(current)}%`;
                  chart.update();
              }
          },
          plugins: {
              legend: { display: false },
              tooltip: { enabled: false }
          }
      }
  };

  const chart = new Chart(ctx, config);
</script>



</main>


    <?php include '../layouts/default/footer.php'; ?>