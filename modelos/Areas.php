<?php
require_once 'Conexion.php';


class Area extends Conexion
{
    public $area_id;
    public $area_nombre;
    public $area_situacion;


    public function __construct($args = [])
    {
        $this->area_id = $args['area_id'] ?? null;
        $this->area_nombre = $args['area_nombre'] ?? '';
        $this->area_situacion = $args['area_situacion'] ?? 1;
    }

    // METODO PARA INSERTAR
    public function guardar()
    {
        $sql = "INSERT into Areas (area_nombre) values ('$this->area_nombre')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    // METODO PARA CONSULTAR


    public function buscar(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM Areas where area_situacion = 1 ";

        if ($this->area_nombre != '') {
            $sql .= " AND area_nombre like '%$this->area_nombre%' ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }
}