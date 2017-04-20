<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resumen de temperaturas</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"> 
    </head>
    <body>
        <form name="introduceTemperaturas" action="informeTemperaturas2.php" method="POST">
            <?php
            $ciudades = array("Madrid", "Barcelona", "Bilbao", "Sevilla");
            $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                "Septiembre", "Octubre", "Noviembre", "Diciembre");
            foreach ($ciudades as $ciudad) {
                echo "<table>";
                echo "<tr><th>" . $ciudad . "</th></tr>";
                echo "<tr><th>Meses</th><th>Tmax</th><th>Tmin</th></tr>";
                foreach ($meses as $mes) {
                    $tmax = rand(35, 10);
                    $tmin = rand(5, -15);
                    echo "<tr><td>" . $mes . "</td>"
                    . "<td><input name=temperaturas[$ciudad][$mes][tmax] type=text value=" . $tmax . "></td>"
                    . "<td><input name=temperaturas[$ciudad][$mes][tmin] type=text value=" . $tmin . "></td></tr>";
                }
                echo "</table>";
            }
            ?>
            <input type="submit" value="Enviar" name="botonenvio">
        </form>
    </body>
</html>