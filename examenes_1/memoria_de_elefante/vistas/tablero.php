<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tablero de juego</title>
    </head>
    <body>
        <h1>Memoria de Elefante</h1>
        <?php
        if (isset($error)) {
            echo "<h1>Haz 1 jugada por turno!!!!!</h1>";
        }
        ?>
        <form method="post" action="../index.php">
            <?php
            echo "<table border=1>";
            if (empty($tablero)) {
                for ($fila = 0; $fila <= 9; $fila++) {
                    echo "<tr>";
                    for ($columna = 0; $columna <= 9; $columna++) {
                        echo "<td><select name=tablero[$fila][$columna]><option>"
                        . "</option><option>X</option></td>";
                    }
                    echo "</tr>";
                }
            } else {
                foreach ($tablero as $fila => $columnas) {
                    echo "<tr>";
                    foreach ($columnas as $columna => $valor) {
                        if (empty($tablero[$fila][$columna])) {
                            echo "<td><select name=tablero[$fila][$columna]>"
                                    . "<option></option><option>X</option></td>";
                        } else {
                            echo "<td><input name=tablero[$fila][$columna] "
                                    . "value=$valor size=1></td>";
                        }
                    }
                }
            }
            echo "</table>";
            echo "<table>";
            foreach ($panelJugado as $fila => $columnas) {
                echo '<tr>';
                foreach ($columnas as $columna => $valor) {
                    echo "<td><input name=panel[$fila][$columna] type=hidden "
                    . "value=$valor></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
            <br><br><input name="boton_recordatorio" type="submit" 
                           value="RECORDATORIO">
            <input name="boton_jugar" type="submit" value="JUGAR">
        </form>
    </body>
</html>
