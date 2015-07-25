<?php
function conectaBaseDatos(){
    try{
        $servidor = "localhost";
        $puerto = "3306";
        $basedatos = "traajo_clases";
        $usuario = "root";
        $contrasena = "";
 
        $conexion = new PDO("mysql:host=$servidor;port=$puerto;dbname=$basedatos",
                            $usuario,
                            $contrasena,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conexion;
    }
    catch (PDOException $e){
        die ("No se puede conectar a la base de datos". $e->getMessage());
    }
}

function dameGiro(){
    $resultado = false;
    $consulta = "SELECT * FROM giro_empresa";
 
    $conexion = conectaBaseDatos();
    $sentencia = $conexion->prepare($consulta);
 
    try {
        if(!$sentencia->execute()){
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
 
    return $resultado;
}

function dameGrilla($num_Fac){
    $resultado = false;
    $consulta = "SELECT pr.nombre_producto, fc.cantidad, pr.precio, fc.cod_producto FROM factura_detalle fc, producto pr WHERE pr.cod_producto = fc.cod_producto and fc.num_factura=:num_factura";
 
    $conexion = conectaBaseDatos();
    $sentencia = $conexion->prepare($consulta);
 
    try {
        if(!$sentencia->execute(array(":num_factura"=>$num_Fac))){
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
 
    return $resultado;
}

function dameProducto(){
    $resultado = false;
    $consulta = "SELECT * FROM producto WHERE stock>=1";
 
    $conexion = conectaBaseDatos();
    $sentencia = $conexion->prepare($consulta);
 
    try {
        if(!$sentencia->execute()){
            print_r($sentencia->errorInfo());
        }
        $resultado = $sentencia->fetchAll();
        //$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
    }
    catch(PDOException $e){
        echo "Error al ejecutar la sentencia: \n";
            print_r($e->getMessage());
    }
 
    return $resultado;
}