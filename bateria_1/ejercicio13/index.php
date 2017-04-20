<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>cuenta articulos</title>
    </head>
    <body>
        <form name="introduceTexto" action="buscarArticulos.php" method="POST">
            <label for="texto">Introduce un texto: </Label><br/> 
            <textarea id="texto" type="text" name="texto" rows="5" cols="40" required="required"></textarea>
            <br/>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>
