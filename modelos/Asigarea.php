<?php
require_once 'Conexion.php';

class AsignacionAreas extends Conexion {
    public $asignacionarea_id;
    public $empleado_id;
    public $area_id;

    public function __construct($args = [] ) {
        $this->asignacionarea_id = $args['asignacionarea_id'] ?? null;
        $this->empleado_id = $args['empleado_id'] ?? '';
        $this->area_id = $args['area_id'] ?? '';
    }

    public function guardar() {
        $sql = "INSERT INTO Asignacionesareas (empleado_id, area_id) VALUES ($this->empleado_id, $this->area_id)";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
?>
