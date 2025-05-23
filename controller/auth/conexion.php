<?php
// controller/auth/conexion.php

class RedisConnection {
    private Redis $redisLocal;
    private ?Redis $redisCloud = null;
    private bool $conInternet = false;

    public function __construct() {
        // Conexión local siempre
        $this->redisLocal = new Redis();
        $this->redisLocal->connect('localhost', 6379);

        // Verificamos conexión a Internet
        if ($this->esConexionInternetDisponible()) {
            $this->conInternet = true;
            error_log("🌐 Conexión a Internet detectada. Usando Redis en la nube.");

            // Intentamos conexión con Redis en la nube
            try {
                $this->redisCloud = new Redis();
                $this->redisCloud->connect('redis-14432.c9.us-east-1-2.ec2.redns.redis-cloud.com', 14432);
                $this->redisCloud->auth('verdefast');

                // Sincronizamos si hay pendientes
                $this->sincronizarPendientes();
            } catch (RedisException $e) {
                error_log("❌ Error conectando con Redis en la nube: " . $e->getMessage());
                $this->redisCloud = null;
                $this->conInternet = false;
            }
        } else {
            error_log("🚫 Sin Internet. Solo Redis local.");
        }
    }

    private function esConexionInternetDisponible(): bool {
        return @fsockopen('www.google.com', 80, $errno, $errstr, 3) ? true : false;
    }

    /**
     * Guarda un dato en Redis local y, si hay internet, también en la nube.
     * Si no hay internet, guarda en una cola para sincronizar después.
     */
    public function guardarDato(string $clave, string $valor): void {
        // Guardar siempre en Redis local
        $this->redisLocal->set($clave, $valor);
        error_log("✅ Guardado en Redis local: $clave");

        if ($this->conInternet && $this->redisCloud) {
            try {
                $this->redisCloud->set($clave, $valor);
                error_log("☁️ También guardado en Redis nube: $clave");
            } catch (RedisException $e) {
                error_log("⚠️ Error al guardar en Redis nube: " . $e->getMessage());
                $this->agregarAColaSync($clave, $valor);
            }
        } else {
            $this->agregarAColaSync($clave, $valor);
        }
    }

    /**
     * Agrega un dato a la cola de sincronización en Redis local.
     */
    private function agregarAColaSync(string $clave, string $valor): void {
        $pendientes = ['clave' => $clave, 'valor' => $valor];
        $this->redisLocal->rPush('cola_sync', json_encode($pendientes));
        error_log("📦 Agregado a cola de sincronización: $clave");
    }

    /**
     * Sincroniza los datos en cola local hacia la nube.
     * Se llama automáticamente desde el constructor si hay conexión.
     */
    public function sincronizarPendientes(): void {
        if ($this->conInternet && $this->redisCloud) {
            while ($item = $this->redisLocal->lPop('cola_sync')) {
                $data = json_decode($item, true);
                if (isset($data['clave'], $data['valor'])) {
                    try {
                        $this->redisCloud->set($data['clave'], $data['valor']);
                        error_log("🔄 Sincronizado con la nube: {$data['clave']}");
                    } catch (RedisException $e) {
                        error_log("⚠️ Fallo sincronizando {$data['clave']}, reinsertando en cola.");
                        $this->redisLocal->lPush('cola_sync', $item); // Reinsertamos al inicio
                        break; // Detenemos para no perder el orden
                    }
                }
            }
        }
    }

    // Métodos auxiliares públicos si necesitas usar los objetos directamente
    public function getLocal(): Redis {
        return $this->redisLocal;
    }

    public function getNube(): ?Redis {
        return $this->redisCloud;
    }

    public function hayInternet(): bool {
        return $this->conInternet;
    }
}
?>
