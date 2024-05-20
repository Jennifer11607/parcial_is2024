<?php
require 'Conexion.php';

class comida extends Conexion{
    public $com_id;
    public $com_nombre;
    public $com_menu;
    public $com_fecha;
    public $com_tiempo;
    public $com_sirvio;
    public $com_situacion;


    public function __construct($args = [])
    {
        $this->com_id = $args['com_id'] ?? null;
        $this->com_nombre = $args['com_nombre'] ?? '';
        $this->com_menu = $args['com_menu'] ?? '';
        $this->com_fecha = $args['com_fecha'] ?? 0;
        $this->com_tiempo = $args['com_tiempo'] ?? 0;
        $this->com_sirvio = $args['com_sirvio'] ?? 0;
        $this->com_situacion = $args['com_situacion'] ?? '';

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into comida (com_nombre,
         com_menu, com_fecha, com_tiempo, com_sirvio) values ('$this->com_nombre',
         '$this->com_menu', '$this->com_fecha', '$this->com_tiempo', '$this->com_sirvio')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM comida where com_situacion = 1 ";

        if($this->com_nombre != ''){
            $sql .= " AND com_nombre like '%$this->com_nombre%' ";
        }
        if($this->com_menu != ''){
            $sql .= " AND com_menu = $this->com_menu ";
        }

        if($this->com_fecha != ''){
            $sql .= " AND com_fecha = $this->com_fecha ";
        }

        if($this->com_tiempo != ''){
            $sql .= " AND com_tiempo = $this->com_tiempo ";
        }
        if($this->com_sirvio != ''){
            $sql .= " AND com_sirvio = $this->com_sirvio ";
        }


        $resultado = self::servir($sql);
        return $resultado;
}

}