<?php
include ("mantenedor.php");
session_name("factura");
session_start();
$num_fac=$_SESSION['fac'];
$cod_prod=$_POST['producto'];
$cant=$_POST['canti'];
crea_detalle($num_fac, $cod_prod, $cant);