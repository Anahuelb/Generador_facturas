<?php
//require_once("combos.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gestion Facturacion Electronica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body bgcolor="#8FEBE5">
        <div align="center">
            <img src="img/banner_servicios.jpg" align="center">
        </div>
        <div align="center">
            <h1>BIENVENIDO A FACTURACION ELECTRONICA</h1>
        </div>
        <div align='center'>
            <form name="prefactura" method="POST" action="Detalle.php" >
                <table>
                    <tr>
                        <td>
                            <label>RUT</label>
                        </td>
                        <td>
                            <input type="text" name="rut" id="rut" placeholder="ingrese su rut" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Fecha</label>
                        </td>
                        <td>
                            <input type="date" name="fecha" id="fecha" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td align="center"><input type="submit" value="Proceder"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div align="center">
            <a href="RegistroNewCliente.php">Registro nuevo Cliente</a>
        </div>
    </body>
</html>