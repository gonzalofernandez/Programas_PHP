<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tabla de multiplicar</title>
    </head>
    <body>
        <h2>Generador de tablas de multiplicar</h2>
        <form name="formulario_entrada" action="procesa_numero_mejorado.php" method="POST">
            Escribe un numero del 1-9:
            <input name="numero_elegido" type="text" required="required"/><br><br>
            <input name="boton_enviar" type="submit" value="GENERAR TABLA"/>
        </form>
    </body>
</html>