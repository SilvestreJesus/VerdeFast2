<?php
header('Content-Type: application/json');
$config = require __DIR__ . '/../dispositivo.php';
$esp32 = $config['esp32'];

$response = @file_get_contents("$esp32/sensores");
if ($response === FALSE) {
    echo json_encode([
        'error' => 'No se pudo acceder al ESP32'
    ]);
} else {
    echo $response;
}
