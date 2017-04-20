<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Lo sentimos, no has acertado el número secreto.<br><br> 
        <form name="volverAJugar" action="index.php" method="POST">
            Para volver a jugar escribe un nuevo número y pulsa el botón
            <input name="nuevo_numero_jugado" type="text"> 
            <?php echo '<input name="numero_secreto" type="hidden" value="' . $numeroAleatorio . '"><br><br>'; ?>
            <input name="boton_nuevo_intento" type="submit" value="Nueva Partida">
        </form>
    </body>
</html>
