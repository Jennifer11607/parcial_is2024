<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Conexion {
    protected static $conexion = null;

    public static function conectar() {
        $conexion = null;

        try {
            $conexion = new PDO("informix:host=host.docker.internal; service=9088;database=tienda; server=informix; protocol=onsoctcp;EnableScrollableCursors=1", "informix", "in4mix");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa";
        } catch (PDOException $e) {
           
            error_log("Error de conexión a la base de datos: " . $e->getMessage());
           
            echo "Ha ocurrido un error al conectar con la base de datos. Por favor, inténtalo de nuevo más tarde.";
            $conexion = null;
        }

        return $conexion;
    }
}

$conn = Conexion::conectar();
if (!$conn) {

    echo "No se pudo establecer conexión con la base de datos";
   
    exit;
    
}

