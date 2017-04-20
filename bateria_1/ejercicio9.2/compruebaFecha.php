<?php

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $fecha = $_POST['fecha'];
    $dia = (int) strtok($fecha, "-");
    $mes = (int) strtok("-");
    $anyo = (int) strtok("-");
    echo checkdate($mes, $dia, $anyo) ? "La fecha es correcta" : "La fecha introducida no es correcta";
}
?>