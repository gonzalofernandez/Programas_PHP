<?php

function comprobarBisisesto($anyo) {
    return ($anyo % 4 == 0 || ($anyo % 100 == 0 && $anyo % 400)) ? true : false;
}

function calcularDiasDeMes($param, $bisiesto) {
    switch ($param) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12: $numDias = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11: $numDias = 30;
            break;
        default :
            $bisiesto ? $numDias = 29 : $numDias = 28;
    }
    return $numDias;
}

function validarFecha($paramDia, $paramMes, $paramAnyo) {
    $bisiesto = comprobarBisisesto($paramAnyo);
    if ($paramAnyo < 1 || $paramMes < 1 || $paramMes > 12 || 
            $paramDia > calcularDiasDeMes($paramMes, $bisiesto)) {
        $errorFecha = true;
    } else {
        $errorFecha = false;
    }
        
    return $errorFecha;
}

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $fechaIntroducida = $_POST['fecha'];
    $dia = (int) strtok($fechaIntroducida, "/");
    $mes = (int) strtok("/");
    $anyo = (int) strtok("/");
    if ($fechaIntroducida == "") {
        echo "<h1>Introduzca una fecha en el formato solicitado</h1>";
        include 'index.php';
    } else {
        if (validarFecha($dia, $mes, $anyo)) {
            echo "<h1>La fecha introducida no es válida</h1>";
            include 'index.php';
        } else {
            $fechaActual = getdate();
            $diaActual = $fechaActual['mday'];
            $mesActual = $fechaActual['mon'];
            $anyoActual = $fechaActual['year'];
            $anyosCumplidos = $anyoActual - $anyo;
            if (($mes > $mesActual) || ($mes == $mesActual && $dia >= $diaActual)) {
                    $anyosCumplidos--;
            }
            echo 'Tienes ' . $anyosCumplidos . ' años.';
        }
    }
}