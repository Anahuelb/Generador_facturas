<?php
include("mantenedor.php");
$fact=$_GET['fac'];
$codigo=$_GET['cod'];
echo $fact;
echo $codigo;
borra_detalle($fact, $codigo);
echo 'ELIMINADO <br>';
echo 'recargue carro de compras';
header('Location:Grilla.php');