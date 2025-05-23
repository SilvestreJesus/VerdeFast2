<?php
session_start();
require_once '../model/usuarios.php';


$model = new ModeloUsuarios();


// Limpiar toda la sesión
session_unset();
session_destroy();

// Redirigir al login
header('Location: ../../view/form/login.php?logout=1');
exit;
