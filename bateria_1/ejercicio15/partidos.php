<?php

$partidos = $_POST['jornadas'];
$golesCasa = array_column($partidos, "golescasa");
array_multisort($golesCasa, SORT_DESC, $partidos);
echo "<h1>Partido/s con más goles en casa</h1><table>";
foreach ($partidos as $key => $value) {
    if ($value['golescasa'] === max($golesCasa)) {
        echo "<tr><td>" . $value['equipolocal'] . "</td><td>" . $value['golescasa'] . "</td><td>" .
        $value['golesvisitante'] . "</td><td>" . $value['equipovisitante'] . "</td></tr>";
    }
}
echo "</table>";
