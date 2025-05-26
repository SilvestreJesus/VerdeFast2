<?php
session_start();
require __DIR__ . '/usuarios.php';

$controlador = new ControladorUsuarios();

// Detectar si la petición es JSON (desde fetch/AJAX)
$isJson = strpos($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') !== false;

if ($isJson) {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents("php://input"), true);

    try {
        $controlador->crear([
            'nombre' => $input['nombre'] ?? '',
            'apellidos' => $input['apellidos'] ?? '',
            'fecha_nacimiento' => $input['fechaNacimiento'] ?? '',
            'genero' => $input['genero'] ?? '',
            'telefono' => $input['telefono'] ?? '',
            'domicilio' => $input['domicilio'] ?? '',
            'correo' => $input['correo'] ?? '',
            'pass' => $input['pass'] ?? '',
            'rol' => $input['rol'] ?? 'Usuario',
        ]);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

} else {
    // Petición tradicional vía formulario HTML
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $rol = $_POST['rol'];

    try {
        $controlador->crear([
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'fecha_nacimiento' => $fechaNacimiento,
            'genero' => $genero,
            'telefono' => $telefono,
            'domicilio' => $domicilio,
            'correo' => $correo,
            'pass' => $pass,
            'rol' => $rol,
        ]);

        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador') {
            header('Location: ../../view/form/registrar_usuario.php?ok=3');
        } else {
            header('Location: ../../view/main/index.php?ok=3');
        }

    } catch (Exception $e) {
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador') {
            header('Location: ../../view/form/registrar_usuario.php?error=1');
        } else {
            header('Location: ../../view/form/registrar_usuario.php?error=1');
        }
    }
}
