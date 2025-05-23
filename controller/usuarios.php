<?php
// controller/usuarios.php

require_once __DIR__ . '/../model/usuarios.php';  

class ControladorUsuarios {
    private ModeloUsuarios $model;

    // Se instancia el modelo en el constructor
    public function __construct() {
        $this->model = new ModeloUsuarios();
    }

    // Crea un nuevo usuario a partir de los datos proporcionados
    public function crear($datos) {
        // Verifica que todos los campos necesarios estén presentes
        if (!isset($datos['nombre'],$datos['apellidos'], $datos['correo'], $datos['pass'], $datos['telefono'], $datos['genero'], $datos['fecha_nacimiento'], $datos['domicilio'], $datos['rol'])) {
            return ['error' => 'Faltan campos requeridos'];
        }

        // Llama al modelo para crear el usuario
        $id = $this->model->crearUsuario($datos['nombre'], $datos['apellidos'],$datos['correo'], $datos['pass'], $datos['telefono'], $datos['genero'], $datos['fecha_nacimiento'], $datos['domicilio'], $datos['rol']);
        
        // Si el correo ya está registrado, redirige al formulario con un mensaje de error
        if ($id == -1) {
            header('Location: /view/form/registrar_usuario.php?usado=3&origen=index');
            exit;
        }

        // Retorna éxito y el ID generado
        return ['success' => true, 'id' => $id];
    }

    // Obtiene los datos de un usuario por su ID
    public function ver($id) {
        $usuario = $this->model->obtenerUsuario($id);
        return $usuario ?: ['error' => 'Usuario no encontrado'];
    }

    // Actualiza los datos de un usuario existente
    public function actualizar($id, $datos) {
        if ($this->model->actualizarUsuario($id, $datos)) {
            return ['success' => true];
        }
        return ['error' => 'No se pudo actualizar'];
    }

    // Elimina un usuario por su ID
    public function eliminar($id) {
        if ($this->model->eliminarUsuario($id)) {
            return ['success' => true];
        }
        return ['error' => 'No se pudo eliminar'];
    }

    // Devuelve una lista de todos los usuarios
    public function listar() {
        return $this->model->listarUsuarios();
    }

    // Inicia sesión de usuario verificando correo y contraseña
    public function iniciarSesion($correo, $pass) {
        $usuario = $this->model->obtenerUsuarioPorCorreo($correo);
        
        // Verifica si el correo existe
        if (!$usuario) {
            return ['error' => 'Correo no encontrado'];
        }
        
        // Verifica si la contraseña es correcta
        if (password_verify($pass, $usuario['pass_hash'])) {
            //Guarda Datos especificos
            $_SESSION['usuario_id'] = $usuario['id']; 
            $_SESSION['rol'] = $usuario['rol']; 
            $_SESSION['correo'] = $usuario['correo']; 
            return ['success' => true, 'rol' => $usuario['rol']];
        } else {
            return ['error' => 'Contraseña incorrecta'];
        }
    }
}
?>
