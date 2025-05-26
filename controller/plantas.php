<?php
// controller/planta.php

require_once __DIR__ . '/../model/plantas.php';

class GuardarPlanta { 
    private ModeloPlanta $model;

    public function __construct() {
        $this->model = new ModeloPlanta();
    }

    public function guardar($datos) { 
        if (!isset($datos['correo'], $datos['telefono'], $datos['nombre_planta'], $datos['tipo'], $datos['familia'], $datos['cantidad'], $datos['tamaño_largo'], $datos['tamaño_ancho'])) {
            return ['error' => 'Faltan campos requeridos'];
        }
        
        $id = $this->model->guardarPlanta(
            $datos['correo'],
            $datos['telefono'],
            $datos['nombre_planta'],
            $datos['tipo'],
            $datos['familia'],
            $datos['cantidad'],
            $datos['tamaño_largo'],
            $datos['tamaño_ancho']
        );

        return ['success' => true, 'id' => $id];
    }
}
?>
