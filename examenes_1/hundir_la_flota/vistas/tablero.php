<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tablero en juego</title>
    </head>
    <body>
        <h1>Hundir la flota</h1><br><br>
        <?php
        if (isset($error)) {
            echo "<h1>Haz 1 jugada por turno</h1><br><br>";
        }
        ?>
        <form action="../index.php" method="post">
            <?php
            echo "<table border=1>";
            if (empty($tablero)) {
                for ($i = 0; $i <= 9; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j <= 9; $j++) {
                        echo "<td><select name=tablero[$i][$j]><option></option><option>X</option></select></td>";
                    }
                    echo "</tr>";
                }
            } else {
                foreach ($tablero as $fila => $columnas) {
                    echo "<tr>";
                    foreach ($columnas as $columna => $valor) {
                        if (empty($valor)) {
                            echo "<td><select name=tablero[$fila][$columna]><option></option><option>X</option></select></td>";
                        } else {
                            echo "<td><input name=tablero[$fila][$columna] value=$valor size=1></td>";
                        }
                    }
                    echo "</tr>";
                }
            }
            echo "</table>";
            if (isset($panel)) {
                echo "<table>";
                foreach ($panel as $fila => $columnas) {
                    echo "<tr>";
                    foreach ($columnas as $columna => $valor) {
                        if (isset($panel[$fila][$columna])) {
                            echo "<td><input name=panel[$fila][$columna] type=hidden value=$valor></td>";
                        }
                        echo "</tr>";
                    }
                }
                echo "</table>";
            }
            ?>
            <br><br><input type="submit" name="boton_jugar" value="JUGAR">
        </form>
    </body>
</html>
