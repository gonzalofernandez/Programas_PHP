<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Adivina el numero</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form name="formulario_entrada" action="formulario_entrada.php" method="POST">
            Introduce un número:
            <input name="numero_menor" type="number" required="required"/><br>
            Introduce un número mayor que el anterior:
            <input name="numero_mayor" type="number" required="required"/><br>
            Prueba suerte con un número que esté entre ellos:
            <input name="prueba_numero" type="number" required="required"/><br>
            <input name="boton_enviar" type="submit" value="ENVIAR"/>
        </form>
    </body>
</html>
 