<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Validador de numeros primos</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"> 
    </head>
    <body>
        <form name="introduceNumero" action="compruebaNumero.php" method="POST">
            <label for="numero">Introduce un numero: </label><br/> 
            <input id="numero" type="text" name="numero" cols="4" required="required"/>
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>