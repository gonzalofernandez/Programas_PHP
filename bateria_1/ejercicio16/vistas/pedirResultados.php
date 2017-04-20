<html>
    <head>
        <meta charset="UTF-8">
        <title>partido con mas goles en casa</title>
    </head>
    <body>
        <h1>Partido con más goles en casa</h1>
        <form name="resultados" action="index.php" method="POST">
            <?php
            foreach ($partidos as $jornada => $value) {
                $jornada = $jornada + 1;
                echo "<table><tr><th>Jornada " . $jornada . "</th></tr>";
                echo "<tr><th>equipo LOCAL</th><th>GOLES</th><th>GOLES</th><th>equipo VISITANTE</th></tr>";
                echo "<tr><td><input name=jornadas[$jornada][equipolocal] value=" . $value[0] . " type=text readonly></td>" .
                "<td><input name=jornadas[$jornada][golescasa] type=text></td>" .
                "<td><input name=jornadas[$jornada][golesvisitante] type=text></td>" .
                "<td><input name=jornadas[$jornada][equipovisitante] value=" . $value[1] . " type=text readonly></td></tr></table>";
            }
            ?>
            <input type="submit" value="Confirmar resultados" name="boton_enviar_resultados">
        </form>
    </body>
</html>


