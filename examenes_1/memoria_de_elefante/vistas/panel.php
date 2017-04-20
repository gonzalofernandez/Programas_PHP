<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel inicial</title>
    </head>
    <body>
        <h1>Memoria de Elefante</h1>
        <form method="post" action="../index.php">
            <?php
            echo "<table border=1>";
            for ($fila = 0; $fila <= 9; $fila++) {
                echo '<tr>';
                for ($columna = 0; $columna <= 9; $columna++) {
                    if (empty($panelJugado[$fila][$columna])) {
                        echo "<td><input name=panel[$fila][$columna] readonly "
                        . "value=- size=10></td>";
                    } else {
                        echo "<td><input name=panel[$fila][$columna] readonly "
                        . "value=" . (string) $panelJugado[$fila][$columna]
                        . " size=10></td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
            if (isset($recordatorio)) {
                echo "<table>";
                foreach ($tablero as $fila => $columnas) {
                    echo "<tr>";
                    foreach ($columnas as $columna => $valor) {
                        echo "<td><input name=tablero[$fila][$columna] "
                                . "type=hidden value=$valor></td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "<input name=recordatorio type=hidden value=1>";
            }
            ?>
            <br><br><input name="boton_listo" type="submit" value="LISTO">
        </form>
    </body>
</html>
