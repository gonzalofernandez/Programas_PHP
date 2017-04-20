<?php

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    define("MESES", "ene,feb,mar,abr,may,jun,ago,sep,oct,nov,dic");
    $mensajeError = "La fecha introducida no es correcta";
    $mensajeFechaOk = "La fecha es correcta.";
    $errorFecha = false;
    $fecha = $_POST['fecha'];
    $dia = (int) strtok($fecha, "-");
    $mes = strtok("-");
    $anyo = (int) strtok("-");
    if ($anyo < 1) {
        echo $errorFecha;
    } else {
        $bisiesto = ($anyo % 4 == 0 || ($anyo % 100 == 0 && $anyo % 400)) ? true : false;
    }
    $meses = explode(",", MESES);
    $numeroMes = array_search($mes, $meses);
    if (!$numeroMes) {
        echo $mensajeError;
    } else {
        switch ($numeroMes) {
            case 4:
            case 6:
            case 9:
            case 11:
                $diasMes = 30;
                break;
            default:
                $diasMes = 31;
        }
        if ($dia > $diasMes || $dia < 1 || ($bisiesto && $numeroMes == 2 && $dia > 29) ||
                (!$bisiesto && $numeroMes == 2 && $dia > 28)) {
            echo $mensajeError;
        } else {
            echo $mensajeFechaOk;
        }
    }
}
?>