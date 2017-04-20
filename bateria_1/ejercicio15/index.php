<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>partido con mas goles en casa</title>
    </head>
    <body>
        <h1>Partido con más goles en casa</h1>
        <form name="resultados" action="partidos.php" method="POST">
            <?php
            $equipos = array("RealMadrid", "ManchesterUtd", "ACMilan");
            $numeroJornada = 0;
            foreach ($equipos as $equipo => $equipoLocal) {
                foreach ($equipos as $equipo => $equipoVisitante) {
                    if ($equipoLocal !== $equipoVisitante) {
                        $partidos[$numeroJornada] = [$equipoLocal, $equipoVisitante];
                        $numeroJornada++;
                    } else {
                        $numeroJornada;
                    }
                }
            }
            foreach ($partidos as $jornada => $value) {
                echo "<table><tr><th>Jornada " . $jornada . "</th></tr>";
                echo "<tr><th>equipo LOCAL</th><th>GOLES</th><th>GOLES</th><th>equipo VISITANTE</th></tr>";
                echo "<tr><td><input name=jornadas[$jornada][equipolocal] value=" . $value[0] . " type=text readonly></td>" .
                "<td><input name=jornadas[$jornada][golescasa] type=text></td>" .
                "<td><input name=jornadas[$jornada][golesvisitante] type=text></td>" .
                "<td><input name=jornadas[$jornada][equipovisitante] value=" . $value[1] . " type=text readonly></td></tr></table>";
            }
            ?>

            <input type="submit" value="Confirmar resultados" name="boton_enviar">
        </form>
    </body>
</html>
