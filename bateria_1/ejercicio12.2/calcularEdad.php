<?php

function calcularEdad($fecha) {
    $dia = (int) strtok($fecha, "/");
    $mes = (int) strtok("/");
    $anyo = (int) strtok("/");
    $datosDeFecha = [$anyo, $mes, $dia];
    $fechaOrdenada = implode("/", $datosDeFecha);
    return (int) ((time() - strtotime($fechaOrdenada)) / 31556926);
}

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $fechaIntroducida = $_POST['fecha'];
    echo calcularEdad($fechaIntroducida);
}
