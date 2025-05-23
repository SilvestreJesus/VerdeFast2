<?php 
require '../usuarios.php';

$modelo = new ModeloUsuarios();

$modelo->crearUsuario('Juan Pérez', 'juan@verdefast.com', '123456', '123456789', 'masculino', '1990-01-01', 'Calle 123');

$modelo->obtenerUsuario(1);

?>