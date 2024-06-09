<?php
require_once 'Conexion.php';

class Puesto extends Conexion{
    public $puesto_id;
    public $puesto_nombre;
    public $puesto_sueldo;
    public $puesto_situacion;


    public function __construct($args = [])
    {
        $this->puesto_id = $args['puesto_id'] ?? null;
        $this->puesto_nombre = $args['puesto_nombre'] ?? '';
        $this->puesto_sueldo = $args['puesto_sueldo'] ?? 0.00;
        $this->puesto_situacion = $args['puesto_situacion'] ?? 1;
    }

    // METODO PARA INSERTAR
    public function guardar(){
        $sql = "INSERT into Puestos (puesto_nombre, puesto_sueldo) values ('$this->puesto_nombre','$this->puesto_sueldo')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}