<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>solicitar equipos</title>
    </head>
    <body>
        <form name="pedirequipos" action="index.php" method="POST">
            Escriba el primer equipo:
            <input name="equipos[0]" type="text"><br>
            Escriba el segundo equipo:
            <input name="equipos[1]" type="text"><br>
            Escriba el tercer equipo:
            <input name="equipos[2]" type="text"><br><br>
            <input type="submit" value="Confirmar equipos" name="boton_enviar_equipos">
        </form>
    </body>
</html>
