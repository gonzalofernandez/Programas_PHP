<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '<h1>Enhorabuena!, has ganado la partida</h1><br>';
        echo 'Pulse en el botón para volver a jugar<br>';
        echo '<form action=index.php method=POST>';
        echo '<br><input name=nueva_partida type=submit value=Confirmar jugada></form>';
        ?>
    </body>
</html>
