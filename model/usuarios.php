<?php
// model/usuarios.php

include_once(__DIR__ . '/../controller/auth/conexion.php');

// Clase para gestionar usuarios en Redis
class ModeloUsuarios {
    private Redis $redisLocal;
    private Redis $redisNube;

    // Constructor: establece conexión con Redis local y en la nube
    public function __construct() {
        $redisConnection = new RedisConnection();
        $this->redisLocal = $redisConnection->getLocal();
        $this->redisNube = $redisConnection->getNube();
    }

    // Guarda una operación (función anónima) tanto en local como en la nube
    private function guardarEnAmbos(callable $operacion) {
        try { $operacion($this->redisLocal); } catch (Exception $e) {}
        try { $operacion($this->redisNube); } catch (Exception $e) {}
    }

    // Verifica si ya existe un correo registrado
    private function correoExistente(string $correo): bool {
        $ids = $this->redisLocal->sMembers('usuarios'); // obtiene todos los IDs de usuarios
        foreach ($ids as $id) {
            $usuario = $this->redisLocal->hGetAll("usuario:$id"); // obtiene los datos del usuario
            if (isset($usuario['correo']) && $usuario['correo'] == $correo) {
                return true; // correo ya registrado
            }
        }
        return false;
    }

    // Crea un nuevo usuario y devuelve su ID (o -1 si el correo ya existe)
    public function crearUsuario(string $nombre, string $apellidos, string $correo, string $pass, string $telefono, string $genero, string $fecha_nacimiento, string $domicilio,string $rol): int {
        if ($this->correoExistente($correo)) {
            return -1; // no permite duplicar correos
        }

        // Genera un nuevo ID autoincremental usando Redis
        $id = $this->redisLocal->incr('usuarios:id');

        // Define el arreglo de datos del usuario
        $usuario = [
            'id' => $id,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'correo' => $correo,
            'pass_hash' => password_hash($pass, PASSWORD_DEFAULT), // encripta la contraseña
            'telefono' => $telefono,
            'genero' => $genero,
            'fecha_nacimiento' => $fecha_nacimiento,
            'domicilio' => $domicilio,
            'rol' =>  $rol,
        ];

        // Guarda los datos del usuario en Redis local y nube
        $this->guardarEnAmbos(function($r) use ($id, $usuario) {
            $r->hMSet("usuario:$id", $usuario); // guarda el hash de datos
            $r->sAdd("usuarios", $id); // añade el ID al conjunto de usuarios
        });

        return $id; // devuelve el nuevo ID
    }

    // Obtiene los datos de un usuario por ID
    public function obtenerUsuario(int $id): array {
        return $this->redisLocal->hGetAll("usuario:$id");
    }

    // Actualiza los datos de un usuario existente
    public function actualizarUsuario(int $id, array $datos): bool {
        if (!$this->redisLocal->exists("usuario:$id")) {
            return false; // no existe el usuario
        }

        $this->guardarEnAmbos(function($r) use ($id, $datos) {
            $r->hMSet("usuario:$id", $datos); // actualiza los datos
        });

        return true;
    }

    // Elimina un usuario por ID
    public function eliminarUsuario(int $id): bool {
        $this->guardarEnAmbos(function($r) use ($id) {
            $r->del("usuario:$id"); // elimina el hash de usuario
            $r->sRem('usuarios', $id); // elimina el ID del conjunto
        });

        return true;
    }

    // Lista todos los usuarios
    public function listarUsuarios(): array {
        $ids = $this->redisLocal->sMembers('usuarios'); // obtiene todos los IDs
        $usuarios = [];
        foreach ($ids as $id) {
            $usuarios[] = $this->redisLocal->hGetAll("usuario:$id"); // obtiene datos de cada usuario
        }
        return $usuarios;
    }

    // Busca un usuario por su correo electrónico
public function obtenerUsuarioPorCorreo(string $correo): ?array {
    $ids = $this->redisLocal->sMembers('usuarios');
    foreach ($ids as $id) {
        $usuario = $this->redisLocal->hGetAll("usuario:$id");
        if (isset($usuario['correo']) && $usuario['correo'] === $correo) {
            return $usuario;
        }
    }
    return null;
}

}
?>
