<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mostrar clasificación</title>
    </head>
    <body>
        <?php
        echo '<h1>Clasificación final de la liga</h1>';
        echo '<table border=1><tr><th>equipos</th><th>puntos</th><th>goles a favor</th><th>goles en contra</th><th>gol average</th>';
        foreach ($clasificacion as $key => $value) {
            echo '<tr><td>' . $key . '</td><td>' . $value['puntos'] . '</td>'
            . '<td>' . $value['goles a favor'] . '</td><td>' . $value['goles en contra'] . '</td>'
            . '<td>' . $value['gol average'] . '</td></tr>';
        }
        echo '</table>';
        ?>
    </body>
</html>
