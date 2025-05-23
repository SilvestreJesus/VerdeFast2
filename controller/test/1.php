<?php
// controller/test/1.php

require '../usuarios.php';

$controlador = new ControladorUsuarios();

$controlador->crear([
    'nombre' => 'Juan Pérez',
    'apellidos' => 'Pérez',
    'fecha_nacimiento' => '1990-01-01',
    'genero' => 'masculino',
    'telefono' => '123456789',
    'domicilio' => 'Calle 123',
    'correo' => 'juan@verdefast.com',
    'pass' => '123456',
]);

header('Location: ../../view/main/index.php?ok=2');
?>