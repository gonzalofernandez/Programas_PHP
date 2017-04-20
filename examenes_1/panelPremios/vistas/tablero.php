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
        <h1>Panel de Premios</h1>
        <?php
        if (isset($error)) {
            echo '<h1>Haz 1 jugada por turno!!!!</h1><br>';
        }
        ?>
        <form action="../index.php" method="post">
            <?php
            if (empty($tablero)) {
                echo "<table border=1>";
                for ($fila = 0; $fila <= 4; $fila++) {
                    echo "<tr>";
                    for ($columna = 0; $columna <= 4; $columna++) {
                        echo "<td><select name=tableroJuego[$fila][$columna]>"
                        . "<option></option><option>X</option></td>";
                    }
                    echo "</tr>";
                }
                echo "</table><br><br>";
            } else {
                echo "<table border=1>";
                foreach ($tablero as $fila => $columnas) {
                    echo "<tr>";
                    foreach ($columnas as $columna => $valor) {
                        if (empty($tablero[$fila][$columna])) {
                            echo "<td><select name=tableroJuego[$fila][$columna]>"
                            . "<option></option><option>X</option></td>";
                        } else {
                            echo "<td><input name=tableroJuego[$fila][$columna] "
                            . "value=$valor></td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table><br><br>";
                echo "<table>";
                foreach ($panel as $fila => $columnas) {
                    echo "<tr>";
                    foreach ($columnas as $columna => $valor) {
                        if (!empty($panel[$fila][$columna])) {
                            echo "<td><input name=panelJuego[$fila][$columna] "
                            . "value=$valor type=hidden></td>";
                        }
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            echo "<p>Te quedan: " . $turnosRestantes . " turnos</p>";
            echo "<p>Has ganado: ";
            if (!empty($premios)) {
                foreach ($premios as $valor) {
                    echo $valor . " ";
                }
                $premios = implode(",", $premios);
                echo "<input type=hidden name=premios_acumulados value=$premios>";
            }
            echo "</p>";
            echo "<input type=hidden name=turnos value=$turnosRestantes>";
            ?>
            <br><br><input name="boton_jugar" type="submit" value="JUGAR">
        </form>
    </body>
</html>
