<?php
require_once("combos.php");
?>
<body bgcolor="#8FEBE5">
    <div align="center">
        <img src="img/banner_servicios.jpg">
    </div>
    <h1 align="center">Registro Nuevo Cliente</h1>
    <form name="registro" action="Registro.php" method="POST">
        <table align="center" bgcolor="#FFFFFF">
            <tr>
                <td><label>RUT</label></td>
                <td>
                    <input name="rut" id="rut" type="text" maxlength="12" placeholder="Ingrese su rut ej:55.555.555-5" required>
                </td>
            </tr>
            <tr>
                <td><label>NOMBRE</label></td>
                <td>
                    <input name="nombre" id="nombre" type="text" placeholder="Ingrese su nombre" required>
                </td>
            </tr>
            <tr>
                <td><label>APELLIDO</label></td>
                <td>
                    <input name="apellido" id="apellido" type="text" placeholder="Ingrese su apellido" required>
                </td>
            </tr>
            <tr>
                <td><label>GIRO DE SU EMPRESA</label></td>
                <td>
                    <select name='giro'>
                        <option value="">-elige un giro-</option>
                        <?php
                        $giros = dameGiro();
                        foreach ($giros as $indice => $registro) {
                            echo "<option value=" . $registro['cod_giro'] . ">" . $registro['nombre_giro'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" value="CREAR">
                </td>
            </tr>
        </table>
    </form>
</body>