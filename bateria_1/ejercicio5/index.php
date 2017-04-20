<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculo de factorial</title>
    </head>
    <body>
        <form name="datosFormulario" action="CalcularFactorial.php" method="POST">
            <label for="numero">Introduce un numero: </Label> 
            <input id="numero" type="text" name="numero" size="5" required="required">
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>
