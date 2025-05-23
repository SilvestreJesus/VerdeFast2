<?php
// api/usuarios.php

require_once '../controller/usuarios.php';

header('Content-Type: application/json');
$controller = new ControladorUsuarios();

$metodo = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($metodo) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode($controller->ver((int)$_GET['id']));
        } else {
            echo json_encode($controller->listar());
        }
        break;

    case 'POST':
        echo json_encode($controller->crear($input));
        break;

    case 'PUT':
        if (!isset($_GET['id'])) {
            echo json_encode(['error' => 'Falta ID para actualizar']);
            break;
        }
        echo json_encode($controller->actualizar((int)$_GET['id'], $input));
        break;

    case 'DELETE':
        if (!isset($_GET['id'])) {
            echo json_encode(['error' => 'Falta ID para eliminar']);
            break;
        }
        echo json_encode($controller->eliminar((int)$_GET['id']));
        break;

    default:
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
?>