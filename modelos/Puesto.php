<?php
require_once 'Conexion.php';

class Puesto extends Conexion
{
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
    public function guardar()
    {
        $sql = "INSERT into Puestos (puesto_nombre, puesto_sueldo) values ('$this->puesto_nombre','$this->puesto_sueldo')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // METODO PARA CONSULTAR

    public static function buscarTodos(...$columnas)
    {
        // $cols = '';
        // if(count($columnas) > 0){
        //     $cols = implode(',', $columnas) ;
        // }else{
        //     $cols = '*';
        // }
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM Puestos where puesto_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscar(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';

        $sql = "SELECT $cols FROM Puestos where puesto_situacion = 1 ";

        if ($this->puesto_nombre != '') {
            $sql .= " AND puesto_nombre like '%$this->puesto_nombre%' ";
        }
        if ($this->puesto_sueldo != '') {
            $sql .= " AND puesto_sueldo = $this->puesto_sueldo ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarPorId($id)
    {

        $sql = "SELECT * FROM Puestos where puesto_situacion = 1 and puesto_id = $id ";
        $resultado = array_shift(self::servir($sql));
        // $resultado = self::servir($sql)[0];
        return $resultado;
    }

    // METODO PARA MODIFICAR
    public function modificar()
    {
        $sql = "UPDATE Puestos SET puesto_nombre = '$this->puesto_nombre', puesto_sueldo = '$this->puesto_sueldo' WHERE puesto_id = $this->puesto_id ";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }
}
