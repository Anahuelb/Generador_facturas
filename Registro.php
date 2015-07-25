<?php
include("mantenedor.php");
$rut=$_POST['rut'];
$name=$_POST['nombre'];
$apellido=$_POST['apellido'];
$giro=$_POST['giro'];

insertaNewCliente($rut, $name, $apellido, $giro);
header('Location:index.php');