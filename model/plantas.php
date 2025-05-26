<?php
// model/planta.php
include_once(__DIR__ . '/../controller/auth/conexion.php');

class ModeloPlanta {
    private Redis $redis;

    public function __construct() {
        $redisConnection = new RedisConnection();
        $this->redisLocal = $redisConnection->getLocal();
        $this->redisNube = $redisConnection->getNube();
    }

    // Guarda una operación (función anónima) tanto en local como en la nube
    private function guardarEnAmbos(callable $operacion) {
        foreach (['local' => $this->redisLocal, 'nube' => $this->redisNube] as $nombre => $redis) {
            try {
                $operacion($redis);
            } catch (Exception $e) {
                error_log("Error en Redis $nombre: " . $e->getMessage());
            }
        }
    }

    public function guardarPlanta(string $correo, string $telefono, string $nombre_planta, string $tipo, string $familia, string $cantidad, string $tamaño_largo, string $tamaño_ancho): int {
        $id = $this->redis->incr('planta:id');
        $this->redis->hMSet("planta:$id", [
            'correo' => $correo,
            'telefono' => $telefono,
            'nombre_planta' => $nombre_planta,
            'tipo' => $tipo,
            'familia' => $familia,
            'cantidad' => $cantidad,
            'tamaño_largo' => $tamaño_largo,
            'tamaño_ancho' => $tamaño_ancho,
        ]);

        $this->redis->sAdd('planta', $id);
        $this->redis->sAdd("usuario:$correo:plantas", $id);
        return $id;
    }

    public function generarNuevoIdPlanta($id_usuario) {
        $plantas = $this->redis->sMembers("usuario:$id_usuario:plantas");
        $nuevoId = count($plantas) + 1;
        return $nuevoId;
    }

    public function obtenerPlantasPorCorreo(string $correo): array {
        $ids = $this->redis->keys('planta:*');
        $plantas = [];
    
        foreach ($ids as $id) {
            $planta = $this->redis->hGetAll($id);
            if (isset($planta['correo']) && $planta['correo'] == $correo) {
                $plantas[] = $planta;
            }
        }
        return $plantas;
    }

}
