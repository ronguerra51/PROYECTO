<?php
require_once 'Conexion.php';

class AsignacionPuestos extends Conexion
{
    public $asignacionpuesto_id;
    public $empleado_id;
    public $puesto_id;

    public function __construct($args = [])
    {
        $this->asignacionpuesto_id = $args['asignacionpuesto_id'] ?? null;
        $this->empleado_id = $args['empleado_id'] ?? '';
        $this->puesto_id = $args['puesto_id'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO Asignacionespuestos (empleado_id, puesto_id) VALUES ($this->empleado_id, $this->puesto_id)";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    // Método para consultar empleados y puestos asignados
    public function buscarEmpleadosPuestos($empleadoNombre)
    {
        $sql = "SELECT empleado_nombre, puesto_nombre, puesto_sueldo 
                FROM Empleado 
                JOIN Puestos  ON puesto_id = puesto_id
                WHERE empleado_situacion = 1";

        if ($empleadoNombre != '') {
            $empleadoNombre = strtolower($empleadoNombre); 
            $sql .= " AND LOWER(empleado_nombre) LIKE '%$empleadoNombre%'";
        }

        $resultado = self::servir($sql);

        // var_dump($sql);
        // exit;
        return $resultado;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM Asignacionespuestos WHERE asignacionpuesto_id = $id";
        $resultado = array_shift(self::servir($sql));
        return $resultado;
    }
}
