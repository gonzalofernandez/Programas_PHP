<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tabla de multiplicar</title>       
    </head>
    <body>
<!--        <form name="Formregistro" action="multiplicarUno.php" method="POST">-->
        <form name="Formregistro" action="multiplicarVarios.php" method="POST">                
            <label for="numero">Introduce un numero del 1-9: </Label> 
            <input id="numero" type="text" name="entradadatos" size="5" required="required"> 
            <input type="submit" value="Enviar" name="botonenvio"> 
        </form>   
    </body>
</html>