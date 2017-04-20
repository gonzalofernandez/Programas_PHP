<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculo de edad</title>
    </head>
    <body>
        <form name="formularioEdad" action="calcularEdad.php" method="POST">
            Escribe tu fecha de nacimiento (DD/MM/YYYY):
            <input type="text" name="fecha" size="5"> <!--required="required"-->
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>