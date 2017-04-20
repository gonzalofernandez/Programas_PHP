<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>3 en raya</title>
    </head>
    <body>
        <?php
        echo '<form name=tableroVacio action=index.php method=POST>';
        echo '<table border=1>';
        for ($i = 0; $i <= 2; $i++) {
            echo '<tr>';
            for ($j = 0; $j <= 2; $j++) {
                echo '<td><input name=tablero[' . $i . '][' . $j . ']></td>';
            }
            echo '</tr>';
        }
        echo '</table><br>';
        echo '<input type=submit name=boton_jugar value=Jugar></form>';
        ?>
    </body> 
</html>

