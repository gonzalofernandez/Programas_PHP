<!DOCTYPE html>
<html>
    <head>
        <title>Pantalla juego</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Juego del ahorcado</h1>
        <br>
        <form action="/index.php">
            <label for="palabra_oculta">Palabra oculta:</label>
            <input id="palabra_oculta" type="text" name="palabra_oculta" 
                   value="<?= $palabraOcultada ?>"><br>
            <label for="letras_usadas">Letras usadas:</label>
            <input id="letras_usadas" type="text" name="letras_usadas" 
                   value="<?= $letrasUsadas ?>"><br>
            <label for="letra_jugada">Introduzca una letra:</label>
            <input id="letra_jugada" type="text" name="letra_jugada"><br>
            <input name="boton_jugar" type="submit" value="Enviar">
        </form>
    </body>
</html>

