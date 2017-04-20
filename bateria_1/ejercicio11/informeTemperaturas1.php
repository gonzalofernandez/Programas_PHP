<?php

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $array = $_POST['temperaturas'];
    foreach ($array as $ciudad => $meses) {
        $temperaturasMaximas[$ciudad] = array_column($meses, 'tmax');
        $Tmax = max($temperaturasMaximas[$ciudad]);
        $temperaturasMinimas[$ciudad] = array_column($meses, 'tmin');
        $Tmin = min($temperaturasMinimas[$ciudad]);
        $Tmed = (array_sum($temperaturasMaximas[$ciudad]) + array_sum($temperaturasMinimas[$ciudad])) / (12 * 2);
        $temperaturas[] = array('Ciudad' => $ciudad, 'Tmax' => $Tmax, 'Tmin' => $Tmin, 'Tmed' => $Tmed);
    }
    sort($temperaturas);
    echo "<table>";
    echo "<tr><th>Ciudad</th><th>Tmax</th><th>Tmin</th><th>Tmed</th></tr>";
    foreach ($temperaturas as $ciudad => $datos) {
        echo "<tr><td>" . $datos['Ciudad'] . "</td><td>" . $datos['Tmax'] . "</td><td>" . $datos['Tmin'] . "</td>"
        . "<td>" . $datos['Tmed'] . "</td></tr>";
    }
    echo "</table>";
}

