<!DOCTYPE html>
<html>
    <head>
        <title>Formulario entrada</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Adivina número con varios intentos</h1>
        <?php
        if (isset($mensaje)) {
            ?>
            <h3><?= $mensaje ?></h3>
            <?php
        }
        if (isset($fallo)) {
            ?>
            <h3><?= constant('MSG_ERROR') ?></h3>
            <?php
        }
        ?>
        <form action="index.php" method="POST">
            <?php
            if (isset($ganador) && $ganador === 0) {
                ?>
                <h3>Has necesitado <?= $intentos ?> intentos</h3>
                <label for="boton_nueva_partida">Pulsa el botón para volver a jugar</label>
                <input id="boton_nueva_partida" name="boton_nueva_partida" 
                       type="submit" value="Nueva partida">
                       <?php
                   } else {
                       ?>
                <label for="numero">Escribe un número del 1 al 10: </label>
                <input id="numero" name="numero_jugado" type="text" required><br>
                <input name="boton_jugar" type="submit" value="Jugar">
                <?php
            }
            ?>    
        </form>     
    </body>
</html>
