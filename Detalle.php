<?php
include("mantenedor.php");
require_once("combos.php");
$rut = $_POST['rut'];
$giro =  consultaGiro($rut);
$fecha = $_POST['fecha'];
crea_cabecera($rut, $fecha);
$num_fact = numero_factura($rut);
$name = nombre_apellido($rut);
session_name("factura");
session_start();
$_SESSION['fac'] = $num_fact;
$_SESSION['rut'] = $rut;
$_SESSION['fecha']=$fecha;
$_SESSION['giro']=$giro;
$_SESSION['name']=$name;
echo '<div align="center">
            <img src="img/banner_servicios.jpg">
        </div>';
echo '<table border=1 align="center" bgcolor="#FFFFFF">
            <tr><td><label>RUT:................</label></td><td><label>' . $rut . '</label></td></tr>
            <tr><td><label>NOMBRE:.............</label></td><td><label>' . $name . '</label></td></tr>
            <tr><td><label>FECHA:..............</label></td><td><label>' . $fecha . '</label></td></tr>
            <tr><td><label>GIRO:...............</label></td><td><label>' . $giro . '</label></td></tr>
            <tr><td><label>NUMERO DE FACTURA:..</label></td><td><label>' . $num_fact . '</label><br>
        </table>'
;
?>
<html>
    <head>
        <title>DETALLE FACTURA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery-1.10.2.min.js"></script>
    </head>
    <body onload="recargar();" bgcolor="#8FEBE5">
        
        <div align="center">
            <form name="agregar" id="agregar" method="POST" target="frame" action="gestionFactura.php">
                <table>
                    <td><label>Seleccione Producto</label><select name="producto" id="producto" onchange="">
                            <?php
                            $productos = dameProducto();
                            foreach ($productos as $indice => $registro) {
                                echo "<option value=" . $registro['cod_producto'] . ">" . $registro['nombre_producto'] . "</option>";
                            }
                            ?></select></td>
                    <td><label>Cantidad </label>
                        <?php echo '<input type="number" name="canti" id="canti" min="1" max="" required>';
                                ?></td>
                    <td><input type="submit" value="Agregar"></td>
                </table>
            </form>
        </div>
        <table align='center'>
            <td><a href="#" onclick="tabla.location.reload();
                    return false">ACTUALIZAR COMPRA</a></td>
        </table>
        <div align='center'><iframe name="tabla" id="tabla" src="grilla.php" frameborder="0" width="100%" align="center"></iframe></div>';
        <div><iframe name="frame" id="frame" frameborder="0" height="0" scrolling='no' width="0" align="center"></iframe></div>';
        <script>
            function cambio() {
                var cod = document.getElementById("producto").value;
            }
        </script>
    </body>
</html>