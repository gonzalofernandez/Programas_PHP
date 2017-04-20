<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hundir la flota</title>
    </head>
    <body>
        <?php
        echo "<form action=index.php method=POST>";
        echo "<table border=1>";

        for ($ords = 0; $ords <= 9; $ords++) {
            echo "<tr>";
            for ($abs = 0; $abs <= 9; $abs++) {
                if (!isset($tablero[$ords][$abs]) && !isset($disparo[$ords][$abs])) {
                    echo "<td><select name=disparo[$ords][$abs]><option></option><option value=x>X</option></select></td>";
                } else if (!isset($tablero[$ords][$abs]) && isset($disparo[$ords][$abs])) {
                    echo "<td><input name=disparo[$ords][$abs] readonly size=1 value=" . $disparo[$ords][$abs] . "></td>";
                } else if (isset($tablero[$ords][$abs]) && !isset($disparo[$ords][$abs])) {
                    echo "<td><select name=disparo[$ords][$abs]><option></option><option value=x>X</option></select>"
                    . "<input name=tablero[$ords][$abs] type=hidden value=" . $tablero[$ords][$abs] . "></td>";
                } else if (isset($tablero[$ords][$abs]) && isset($disparo[$ords][$abs])) {
                    echo "<td><input name=disparo[$ords][$abs] readonly size=1 value=" . $disparo[$ords][$abs] . "></td>"
                    . "<input name=tablero[$ords][$abs] type=hidden value=" . $tablero[$ords][$abs] . "></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<input name=impactos type=hidden value=" . $numeroImpactos . ">";
        echo "<br><input name=boton_jugar type=submit value=Confirmar jugada>";
        echo "</form>";
        ?>
    </body>
</html>
