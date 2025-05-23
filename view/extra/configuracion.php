<?php include '../layouts/default/head.php'; ?>
    <title>VerdeFast - Panel de Control</title>
    <link rel="stylesheet" href="/assets/css/extra/configuracion.css">
</head>
<body>
<?php include '../layouts/modules/alertas.php'; ?>
<?php include '../layouts/modules/header.php'; ?>
<?php
// No necesitas session_start() aquí si ya está en header.php

// Inicializar variables de estado según $_SESSION
$riegoEstado = isset($_SESSION['riego_estado']) && $_SESSION['riego_estado'] ? 'checked' : '';
$bioelEstado = isset($_SESSION['pulsos_estado']) && $_SESSION['pulsos_estado'] ? 'checked' : '';
$riegoAutoEstado = isset($_SESSION['riego_auto']) && $_SESSION['riego_auto'] ? 'checked' : '';
$bioelAutoEstado = isset($_SESSION['bioel_auto']) && $_SESSION['bioel_auto'] ? 'checked' : '';

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    $esp32 = "http://192.168.188.147";
    $respuesta = "";

    switch ($accion) {
        case "activar_riego":
            file_get_contents("$esp32/activar_riego");
            $_SESSION['riego_estado'] = true;
            $respuesta = "✅ Riego activado";
            break;
        case "desactivar_riego":
            file_get_contents("$esp32/desactivar_riego");
            $_SESSION['riego_estado'] = false;
            $respuesta = "✅ Riego desactivado";
            break;
        case "activar_pulsos":
            file_get_contents("$esp32/activar_pulsos");
            $_SESSION['pulsos_estado'] = true;
            $respuesta = "✅ Pulsos activados";
            break;
        case "desactivar_pulsos":
            file_get_contents("$esp32/desactivar_pulsos");
            $_SESSION['pulsos_estado'] = false;
            $respuesta = "✅ Pulsos desactivados";
            break;
        case "activar_riegoauto":
            $_SESSION['riego_auto'] = true;
            $respuesta = "✅ Riego automático activado";
            break;
        case "desactivar_riegoauto":
            $_SESSION['riego_auto'] = false;
            $respuesta = "✅ Riego automático desactivado";
            break;
        case "estado_riegoauto":
            echo isset($_SESSION['riego_auto']) && $_SESSION['riego_auto'] ? "1" : "0";
            exit;
        default:
            $respuesta = "❌ Acción inválida";
            break;
    }

    echo $respuesta;
}
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    fetch('/view/extra/configuracion.php?accion=estado_riegoauto')
        .then(res => res.text())
        .then(estado => {
            const checkboxAuto = document.getElementById('riegoauto');
            checkboxAuto.checked = estado.trim() === "1";
        });

    document.getElementById('riegoauto').addEventListener('change', function () {
        const accion = this.checked ? 'activar_riegoauto' : 'desactivar_riegoauto';
        fetch(`/view/extra/configuracion.php?accion=${accion}`);
    });
});
</script>

<main class="main-content">
    <div class="notification-bar">
        <div class="growth-alert">
            Sembradio de papas creció un 5%
        </div>
        <div class="notification-icon">
            <p style="font-size: 30px;">🔔</p>
            <div class="notification-count">8</div>
        </div>
    </div>

    <div class="control-grid">
        <div class="control-panel">
            <h2 class="panel-title">Sistema de riego</h2>
            <label class="switch">
                <input type="checkbox" id="riego" name="riego" class="toggle-switch-input" <?= $riegoEstado ?>>
                <span class="slider"></span>
            </label>
        </div>

        <div class="control-panel">
            <h2 class="panel-title">Sistema de pulsos bioeléctricos</h2>
            <label class="switch">
                <input type="checkbox" id="bioel" name="bioel" class="toggle-switch-input" <?= $bioelEstado ?>>
                <span class="slider"></span>
            </label>
        </div>
    </div>

    <div class="control-grid">
        <div class="control-panel">
            <h2 class="panel-title">Sistema automatizado de riego</h2>
            <label class="switch">
                <input type="checkbox" id="riegoauto" name="riegoauto" class="toggle-switch-input" <?= $riegoAutoEstado ?>>
                <span class="slider"></span>
            </label>
        </div>

        <div class="control-panel">
            <h2 class="panel-title">Sistema automatizado de pulsos </h2>
            <label class="switch">
                <input type="checkbox" id="bioelauto" name="bioelauto" class="toggle-switch-input" <?= $bioelAutoEstado ?>>
                <span class="slider"></span>
            </label>
        </div>
    </div>
</main>

<script>
const url = '/view/extra/configuracion.php?accion=';

document.getElementById('riego').addEventListener('change', function() {
    const accion = this.checked ? "activar_riego" : "desactivar_riego";
    
    fetch(' https://dd9a-2806-370-4220-36fd-9f3-ef57-a66d-a9d5.ngrok-free.app' + url + accion)
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));

    fetch('http://localhost:9400' + url + accion)
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
});

document.getElementById('bioel').addEventListener('change', function() {
    const accion = this.checked ? "activar_pulsos" : "desactivar_pulsos";
    
    fetch(' https://dd9a-2806-370-4220-36fd-9f3-ef57-a66d-a9d5.ngrok-free.app' + url + accion)
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));

    fetch(' https://dd9a-2806-370-4220-36fd-9f3-ef57-a66d-a9d5.ngrok-free.app' + url + accion)
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
});
</script>

</body>
</html>
