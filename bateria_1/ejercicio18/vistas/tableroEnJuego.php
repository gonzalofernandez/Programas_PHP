<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>3 en raya</title>
    </head>
    <body>
        <?php
        echo '<form name=tableroEnJuego action=index.php method=POST>';
        echo '<table border=1>';
        foreach ($tablero as $fila => $casillas) {
            echo '<tr>';
            foreach ($casillas as $casilla => $valor) {
                echo '<td><input name=tablero[' . $fila . '][' . $casilla . '] value=' . $valor . '></td>';
            }
            echo '</tr>';
        }
        echo '</table><br>';
        echo '<input type=submit name=boton_jugar value=Jugar></form>';
        ?>
    </body>
</html>
