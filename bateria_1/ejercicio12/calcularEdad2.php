<?php

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $fechaIntroducida = $_POST['fecha'];
    $dia = (int) strtok($fechaIntroducida, "/");
    $mes = (int) strtok("/");
    $anyo = (int) strtok("/");
    if ($fechaIntroducida == "" || !checkdate($mes, $dia, $anyo)) {
        echo "<h1>Introduzca una fecha en el formato solicitado</h1>";
        include 'index.php';
    } else {
        $fecha = mktime(0, 0, 0, $mes, $dia, $anyo);
        $fechaActual = time();
        $edad = (int) (($fechaActual - $fecha) / 31556926);
        echo 'Tienes ' . $edad . ' años.';
    }
}