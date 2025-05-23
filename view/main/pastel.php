<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gráfica de Pastel Animada</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    #grafica-container {
      width: 300px;
      height: 300px;
      position: relative;
    }

    #graficaPastel {
      width: 100%;
      height: 100%;
    }

    #porcentaje {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      font-size: 24px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div id="grafica-container" style="
    position: relative;
    width: 300px;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
">


<script>
  const ctx = document.getElementById('graficaPastel').getContext('2d');
  const porcentajeTexto = document.getElementById('porcentaje');
  const porcentaje = 66; // valor entre 0 y 100

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

</body>
</html>
