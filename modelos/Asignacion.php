<?php
require_once 'Conexion.php';

class AsignacionPuestos extends Conexion {
    public $asignacionpuesto_id;
    public $empleado_id;
    public $puesto_id;

    public function __construct($args = [] ) {
        $this->asignacionpuesto_id = $args['asignacionpuesto_id'] ?? null;
        $this->empleado_id = $args['empleado_id'] ?? '';
        $this->puesto_id = $args['puesto_id'] ?? '';
    }

    public function guardar() {
        $sql = "INSERT INTO Asignacionespuestos (empleado_id, puesto_id) VALUES ($this->empleado_id, $this->puesto_id)";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
?>
