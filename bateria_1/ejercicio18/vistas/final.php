<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>3 en raya</title>
    </head>
    <body>
        <h1></h1>
        <?php
        echo '<table border=1>';
        foreach ($tablero as $fila => $casillas) {
            echo '<tr>';
            foreach ($casillas as $casilla => $valor) {
                echo '<td><input name=tablero[' . $fila . '][' . $casilla . '] value=' . $valor . '></td>';
            }
            echo '</tr>';
        }
        echo '</table><br>';
        echo '<h1>'.$mensaje.'</h1>';
        ?>
    </body>
</html>
