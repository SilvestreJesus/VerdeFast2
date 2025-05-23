<?php
// iniciar_sesion.php
session_start();  
require_once __DIR__ . '/usuarios.php';

$controlador = new ControladorUsuarios();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    $resultado = $controlador->iniciarSesion($correo, $pass);

    if (isset($resultado['success']) && $resultado['success'] === true) {
        $rol = $_SESSION['rol'];
    

        switch ($rol) {
            case 'administrador':
                header('Location: /view/admin/registro_tecnico.php');
                break;
            case 'cliente':
                header('Location: /view/main/panel.php');
                break;
            case 'tecnico':
                header('Location: /view/tecnico/registro_planta.php');
                break;
            default:
                header('Location: /view/form/selec_planta.php');
                break;
        }
        exit;
    } else {
        header('Location: /view/form/login.php?error=2');
        exit;
    }
}

?>
