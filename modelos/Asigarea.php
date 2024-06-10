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

     // Método para consultar empleados y puestos asignados
     public function buscarEmpleadosAreas($areaNombre)
     {
         $sql = "SELECT empleado_nombre, area_nombre
                 FROM Empleado 
                 JOIN Areas  ON area_id = area_id
                 WHERE empleado_situacion = 1";
 
         if ($areaNombre != '') {
             $areasNombre = strtolower($areaNombre); 
             $sql .= " AND LOWER(area_nombre) LIKE '%$areasNombre%'";
         }
 
         $resultado = self::servir($sql);
 
         // var_dump($sql);
         // exit;
         return $resultado;
     }
 
     public function buscarPorId($id)
     {
         $sql = "SELECT * FROM Asignacionesareas WHERE asignacionarea_id = $id";
         $resultado = array_shift(self::servir($sql));
         return $resultado;
     }
}
?>
