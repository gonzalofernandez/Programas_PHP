<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Encuentra palabra</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"> 
    </head>
    <body>
        <form name="encuentraPalabras" action="buscaPalabra.php" method="POST">
            <label for="texto">Introduce un texto: </Label><br/> 
            <textarea id="texto" type="text" name="texto" rows="5" cols="40" required="required"></textarea>
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>