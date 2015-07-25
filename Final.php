<?php
include ("mantenedor.php");
require_once("combos.php");
session_name("factura");
session_start();
$num_fact = $_SESSION['fac'];
$rut = $_SESSION['rut'];
$fecha = $_SESSION['fecha'];
$giro = $_SESSION['giro'];
$name = $_SESSION['name'];
echo '<div align="center"><h1>FACTURA ELECTRONICA</h1></div><br>';
echo '<div align="center"><table align="center" bgcolor=#FFFFFF>
    <tr><td><label>RUT:  "55.555.555-K"</label></td></tr>
    <tr><td><label>MI EMPRESA</label></td></tr>
    <tr><td><label>CALLE UNO #12345, Estacion Central</label></td></tr>
    <tr><td><label>CHILE</label></td></tr>
</table></div><br>';
echo '<table border=1 align="center" bgcolor="#FFFFFF">
            <tr><td><label>RUT:................</label></td><td><label>' . $rut . '</label></td></tr>
            <tr><td><label>NOMBRE:.............</label></td><td><label>' . $name . '</label></td></tr>
            <tr><td><label>FECHA:..............</label></td><td><label>' . $fecha . '</label></td></tr>
            <tr><td><label>GIRO:...............</label></td><td><label>' . $giro . '</label></td></tr>
            <tr><td><label>NUMERO DE FACTURA:..</label></td><td><label>' . $num_fact . '</label><br>
        </table>'
;
$neto = 0;
?>

<html>
    <head>
        <title>Factura Electronica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body bgcolor="#F2D4B3">       
        <br><br>
        <table  align="center" border="1" widht='900' bgcolor="#FFFFFF"> 
            <tr>
                <td><label>PRODUCTO</label></td><td><label>CANTIDAD</label></td><td><label>PRECIO</label></td><td>Neto</td>
            </tr>
            <?php
            $grilla = dameGrilla($num_fact);
            foreach ($grilla as $indice => $registro) {
                echo "<tr><td>" . $registro['nombre_producto'] . "</td><td>" . $registro['cantidad'] . "</td><td>" . $registro['precio'] . "</td><td><label>" . $registro['precio'] * $registro['cantidad'] . "</label></td></tr>";
                $neto = $neto + ($registro['precio'] * $registro['cantidad']);
                editaStock($registro['nombre_producto'], $registro['cantidad']);
            }
            ?>
            <tr><td></td><td></td><td><label>TOTAL NETO</label></td><td><label><?php echo $neto; ?></label></td></tr>
            <tr><td></td><td></td><td><label>I.V.A</label></td><td><label><?php echo $neto * 0.19; ?></label></td></tr>
            <tr><td></td><td></td><td><label>TOTAL</label></td><td><label><?php echo $neto * 1.19; ?></label></td></tr>
        </table>
        <br>
        <br>
        <a href="javascript:window.print()"  align="right">IMPRIMIR</a>
    </body>
</html>
