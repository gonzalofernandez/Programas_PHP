<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resumen de premios</title>
    </head>
    <body>
        <?php
        if (empty($premios)) {
            echo "<h1>Lo setimos, no ha conseguido ningún premio.</h1><br><br>";
        } else {
            echo "<h1>Enhorabuena!!!!!</h1>";
            echo "<p>Ha conseguido: ";
            foreach ($premios as $valor) {
                echo "<strong> " . $valor . " </strong>";
            }
            echo "</p>";
        }
        ?>
        <form method="post" action="../index.php">
            Para volver a jugar pulse el botón
            <input name="nueva_partida" type="submit" value="NUEVA PARTIDA">
        </form>
    </body>
</html>
