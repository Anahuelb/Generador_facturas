<?php
include ("conectar.php");

function numero_factura($rut){
    $db = conecta();
    $consulta = "SELECT MAX(num_factura) from factura_cabecera where rut = :rut";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":rut"=>$rut));
    $num_fac=$resul->fetch(PDO::FETCH_ASSOC);
    $res=$num_fac['MAX(num_factura)'];
    $resul->closeCursor();
    return $res;
}
function nombre_apellido($rut){
    $db = conecta();
    $consulta = "SELECT * FROM cliente where rut = :rut";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":rut"=>$rut));
    $fullname=$resul->fetch(PDO::FETCH_ASSOC);
    $res="".$fullname['nombre']." ".$fullname['apellido'];
    $resul->closeCursor();
    return $res;
}

function crea_cabecera($rut , $fecha){
    $db = conecta();
    $consulta = "INSERT INTO factura_cabecera (rut, fecha, num_factura) values (:rut, :fecha, :num_factura)";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":rut"=>$rut, ":fecha"=>$fecha, ":num_factura"=>NULL));
    $resul->closeCursor();
}

function crea_detalle($num_fac , $cod_prod , $cant){
    $db = conecta();
    $consulta = "INSERT INTO factura_detalle (num_factura, cod_producto, cantidad) values (:num_factura, :cod_producto, :cantidad)";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":num_factura"=>$num_fac, ":cod_producto"=>$cod_prod, ":cantidad"=>$cant));
    $resul->closeCursor();
}
function stock($cod_prod){
    $db = conecta();
    $consulta = "SELECT * FROM producto where cod_producto = :cod_prod";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":cod_prod"=>$cod_prod));
    $stock=$resul->fetch(PDO::FETCH_ASSOC);
    $res=$stock['stock'];
    $resul->closeCursor();
    return $res;
}


function borra_detalle($num_fac, $cod_prod){
    $db = conecta();
    $consulta = "DELETE FROM factura_detalle WHERE  num_factura=:num_factura AND  cod_producto=:cod_producto";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":num_factura"=>$num_fac, ":cod_producto"=>$cod_prod));
    $resul->closeCursor();
}
function insertaNewCliente($rut,$nombre,$apellido,$giro){
    $db = conecta();
    $consulta = "INSERT INTO cliente (rut, nombre, apellido, cod_giro) values (:rut, :nombre, :apellido, :giro)";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":rut"=>$rut, ":nombre"=>$nombre, ":apellido"=>$apellido, ":giro"=>$giro));
    $resul->closeCursor();
}

function consultaGiro($rut){
    $db = conecta();
    $consulta = "SELECT gr.nombre_giro from giro_empresa gr, cliente cl where gr.cod_giro = cl.cod_giro AND cl.rut = :rut";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":rut"=>$rut));
    $gro=$resul->fetch(PDO::FETCH_ASSOC);
    $res=$gro['nombre_giro'];
    $resul->closeCursor();
    return $res;
}

function EditaFactura($fac,$cod,$cant){
    $db = conecta();
    $consulta = "UPDATE factura_detalle SET cantidad=:cantidad WHERE num_factura=:fac AND cod_producto=:cod";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":cantidad"=>$cant, ":fac"=>$fac, ":cod"=>$cod));
    $resul->closeCursor();
}

function editaStock($name,$cant){
    $db = conecta();
    $consulta = "UPDATE producto SET stock=:cantidad WHERE nombre_producto=:nombre";
    $resul = $db->prepare($consulta);
    $resul->execute(array(":cantidad"=>$cant, ":nombre"=>$name));
    $resul->closeCursor();
}