<?php
include("mantenedor.php");
$fac = $_GET['fac'];
$cod = $_GET['cod'];
session_name("factura");
session_start();
$_SESSION['codigoEditado'] = $cod;
$max= stock($cod);
?>
<form action="editaFactura.php" method="POST" name="edicion" id="edicion">
    <table align="center">
        <tr>
            <td>
                <label>PRODUCTO</label>
            </td>
            <td>
            </td>
            <td>
                <label>Nueva Cantidad=</label>
            </td>
            <td>
                <?php echo '<input name="cantidad" id="cantidad" type="number" min="1" max="'.$max.'" required>';?>
                
            </td>
            <td>
                <input type="submit" value="CAMBIAR" href="editaFactura.php?">
            </td>
        </tr>
    </table>
</form>