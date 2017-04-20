<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Localiza el valor de en medio</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"> 
    </head>
    <body>
        <form name="introduceNumeros" action="buscaNumeroMedio.php" method="POST">
            <label for="texto">Introduce un número: </Label><br/> 
            <input id="numero1" type="text"  required = "required" name="datos[numero1]" size="10" />
            <br/>
            <label for="texto">Introduce otro número: </Label><br/> 
            <input id="numero2" type="text"  required = "required" name="datos[numero2]" size="10" />
            <br/>
            <label for="texto">Introduce un tercer número: </Label><br/> 
            <input id="numero3" type="text"  required = "required" name="datos[numero3]" size="10" />
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>