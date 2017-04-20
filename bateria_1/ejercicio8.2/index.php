<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comprueba si año es bisiesto</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"> 
    </head>
    <body>
        <form name="introduceAnyo" action="compruebaBisiesto.php" method="POST">
            <label for="texto">Introduce un año: </Label><br/> 
            <input id="anyo" type="text" name="anyo" cols="4" required="required"/>
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>