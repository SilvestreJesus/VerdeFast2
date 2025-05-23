<?php
// model/redis_test.php

require_once __DIR__ . '/usuarios.php';

$controlador = new ControladorUsuarios();

// Crear usuario como hash (con todos los campos requeridos)
$redis->hMSet("usuario:$userId", [
    'nombre' => 'admin',
    'apellidos' => 'admin',
    'correo' => 'admin@verdefast.com',
    'pass_hash' => password_hash('admin123', PASSWORD_DEFAULT),
    'telefono' => '1234567890',
    'genero' => 'Masculino',
    'fecha_nacimiento' => '1980-01-01', // formato ISO (más útil para comparación)
    'domicilio' => 'Calle Ficticia 123',
    'rol' => 'administrador',
]);

// Agregar ID al set general de usuarios
$redis->sAdd('usuarios', $userId);

// Leer y mostrar el usuario recién creado
$usuario = $redis->hGetAll("usuario:$userId");

echo "Administrador creado con ID $userId:\n";
print_r($usuario);
?>
