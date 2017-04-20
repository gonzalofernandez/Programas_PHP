<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>lanzar dados</title>
    </head>
    <body>
        <form name="formulario_inicial" action="lanzarDado.php" method="POST">
            <label for="numero_tiradas">¿Cuántas veces quieres tirar el dado?</label>
            <input type="text" name="numero_tiradas" cols="2" required="required">
            <br/><br/>
            <input type="submit" value="LANZAR" name="boton_lanzar">
        </form>
    </body>
</html>
