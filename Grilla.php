<?php
require_once("combos.php");
session_name("factura");
session_start();
$num = $_SESSION['fac'];
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script language=javascript>
            function fin(URL) {
                window.open(URL, "ventana1", "width=450,height=650,scrollbars=NO,align=center")
            }
            function edit(URL) {
                window.open(URL, "ventana1", "width=400,height=200,scrollbars=NO")
            }
        </script>
    </head>
    <body >       
        <table  align="center" border="1" widht='900' bgcolor="#FFFFFF">           
            <td><label>PRODUCTO</label></td><td><label>CANTIDAD</label></td><td><label>PRECIO</label></td><td>Editar</td><td>Borrar</td>
            <?php
            $grilla = dameGrilla($num);
            foreach ($grilla as $indice => $registro) {
                //echo "<tr name='tr".$contador."' id='tr".$contador."'><td name='tdPRO".$contador."' id='tdPRO".$contador."'>" . $registro['nombre_producto'] . "</td><td name='tdCAN".$contador."' id='tdCAN".$contador."'>" . $registro['cantidad'] . "</td><td name='tdPRE".$contador."' id='tdPRE".$contador."'>". $registro['precio'] ."</td><td><a href='javascript:editar(".$num_fact."".$registro['cod_producto'].",)'>Editar  </a></td><td><a href='javascript:editar(".$num_fact."".$registro['cod_producto'].",)>  Eliminar</a></td></tr>";
                echo "<tr><td>" . $registro['nombre_producto'] . "</td><td>" . $registro['cantidad'] . "</td><td>" . $registro['precio'] . "</td><td><a href='editar.php?fac=" . $num . "&cod=" . $registro['cod_producto'] . "'>Editar</a></td><td><a href='eliminar.php?fac=" . $num . "&cod=" . $registro['cod_producto'] . "'>Eliminar</a></td></tr>";
            }
            ?>            
        </table>
        <table align='center'>
            <td></td><td>
                <form action="Final.php" method="POST">
                    <a href="javascript:fin('Final.php')" >FINALIZAR</a>
                </form>
            </td>
            <td></iframe></td>
        </table>
    </body>
</html>