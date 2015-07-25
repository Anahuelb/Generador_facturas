<?php
include("mantenedor.php");
session_name("factura");
session_start();
$fac=$_SESSION['fac'];
$cod=$_SESSION['codigoEditado'];
$cant=$_POST['cantidad'];

EditaFactura($fac, $cod, $cant);
header('Location:Grilla.php');


?>