<?php
require_once 'Conexion.php';


class Empleado extends Conexion{
    public $empleado_id;
    public $empleado_nombre;
    public $empleado_dpi;
    public $empleado_edad;
    public $empleado_sexo;
    public $empleado_situacion;


    public function __construct($args = [])
    {
        $this->empleado_id = $args['empleado_id'] ?? null;
        $this->empleado_nombre = $args['empleado_nombre'] ?? '';
        $this->empleado_dpi = $args['empleado_dpi'] ?? '';
        $this->empleado_edad = $args['empleado_edad'] ?? '';
        $this->empleado_sexo = $args['empleado_sexo'] ?? '';
        $this->empleado_situacion = $args['empleado_situacion'] ?? 1;
    }

    // METODO PARA INSERTAR
    public function guardar(){
        $sql = "INSERT into Empleado (empleado_nombre, empleado_dpi, empleado_edad, empleado_sexo) values ('$this->empleado_nombre','$this->empleado_dpi','$this->empleado_edad','$this->empleado_sexo')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

 // METODO PARA CONSULTAR
 

 public function buscar(...$columnas){
    $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $cols FROM Empleado where empleado_situacion = 1 ";
    
    if($this->empleado_nombre != ''){
        $sql .= " AND empleado_nombre like '%$this->empleado_nombre%' ";
    }
    if($this->empleado_dpi != ''){
        $sql .= " AND empleado_dpi like'%$this->empleado_dpi%' ";
    }
    if($this->empleado_dpi != ''){
        $sql .= " AND empleado_edad like'%$this->empleado_edad%' ";
    }
    if($this->empleado_dpi != ''){
        $sql .= " AND empleado_sexo like'%$this->empleado_sexo%' ";
    }

    $resultado = self::servir($sql);
    return $resultado;
}
}