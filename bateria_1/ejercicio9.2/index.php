<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Validador de fecha</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"> 
    </head>
    <body>
        <form name="introduceFecha" action="compruebaFecha.php" method="POST">
            <label for="texto">Introduce una fecha (dd-mmm-aaaa): </Label><br/> 
            <input id="fecha" type="text" name="fecha" cols="4" required="required"/>
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>