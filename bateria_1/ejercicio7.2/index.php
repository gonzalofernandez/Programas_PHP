<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Localiza el valor de en medio</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"> 
    </head>
    <body>
        <form name="introduceNumeros" action="buscaNumeroMedio.php" method="POST">
            <label for="texto">Introduce varios números separados por comas: </Label><br/> 
            <input id="numeros" type="text" name="numeros" cols="10" required="required"/>
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>