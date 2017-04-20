<?php

define("VERTICAL", 1);
define("HORIZONTAL", 0);
define("FILAS", 9);
define("COLUMNAS", 9);

function generarNumero($min, $max) {
    return rand($min, $max);
}

function comprobarDisparos($disparo, $tablero, $numeroImpactos) {
    foreach ($disparo as $key => $value) {
        foreach ($value as $key2 => $value2) {
            if ($value2 === "x") {
                if (isset($tablero[$key][$key2])) {
                    $disparo[$key][$key2] = $tablero[$key][$key2];
                    $numeroImpactos++;
                } else {
                    $disparo[$key][$key2] = "-";
                }
            } else if (!$value2) {
                unset($disparo[$key][$key2]);
            }
        }
    }
    return [$disparo, $numeroImpactos];
}

function comprobarNumeroDisparos($disparos) {
    $numeroDisparos = 0;
    foreach ($disparos as $fila => $columnas) {
        foreach ($columnas as $columna => $valorColumna) {
            if ($valorColumna === "x") {
                $numeroDisparos++;
            }
        }
    }
    return $numeroDisparos === 1;
}

function comprobarCasillasContiguas($tablero, $abscisas, $ordenadas, $orientacion, $mismoBarco) {
    if ($mismoBarco === true) {
        if ($orientacion === HORIZONTAL) {
            $resultadoComprobacion = !isset($tablero[$abscisas - 1][$ordenadas - 1]) &&
                    !isset($tablero[$abscisas][$ordenadas - 1]) &&
                    !isset($tablero[$abscisas + 1][$ordenadas - 1]) &&
                    !isset($tablero[$abscisas + 1][$ordenadas]) &&
                    !isset($tablero[$abscisas - 1][$ordenadas + 1]) &&
                    !isset($tablero[$abscisas][$ordenadas + 1]) &&
                    !isset($tablero[$abscisas + 1][$ordenadas + 1]);
        } elseif ($orientacion === VERTICAL) {
            $resultadoComprobacion = !isset($tablero[$abscisas - 1][$ordenadas - 1]) &&
                    !isset($tablero[$abscisas + 1][$ordenadas - 1]) &&
                    !isset($tablero[$abscisas + 1][$ordenadas]) &&
                    !isset($tablero[$abscisas - 1][$ordenadas + 1]) &&
                    !isset($tablero[$abscisas - 1][$ordenadas]) &&
                    !isset($tablero[$abscisas][$ordenadas + 1]) &&
                    !isset($tablero[$abscisas + 1][$ordenadas + 1]);
        }
    } else {
        $resultadoComprobacion = !isset($tablero[$abscisas - 1][$ordenadas - 1]) &&
                !isset($tablero[$abscisas][$ordenadas - 1]) &&
                !isset($tablero[$abscisas + 1][$ordenadas - 1]) &&
                !isset($tablero[$abscisas + 1][$ordenadas]) &&
                !isset($tablero[$abscisas - 1][$ordenadas + 1]) &&
                !isset($tablero[$abscisas][$ordenadas + 1]) &&
                !isset($tablero[$abscisas - 1][$ordenadas]) &&
                !isset($tablero[$abscisas + 1][$ordenadas + 1]);
    }
    return $resultadoComprobacion;
}

function colocarBarcos($tablero, $tipoBarco) {
    $contador = 0;
    $error = false;
    $tamanyoBarco = $tipoBarco;
    $mismoBarco = ($tamanyoBarco > 1) ? true : false;
    do {
        do {
            $abscisas = generarNumero(0, COLUMNAS);
            $ordenadas = generarNumero(0, FILAS);
            $orientacion = generarNumero(HORIZONTAL, VERTICAL);
        } while (isset($tablero[$abscisas][$ordenadas]) &&
        ($tamanyoBarco == 2 && ($abscisas == 9 || $ordenadas == 9)) ||
        ($tamanyoBarco == 3 && ($abscisas > 7 || $ordenadas > 7)));
        do {
            if (comprobarCasillasContiguas($tablero, $abscisas, $ordenadas, $orientacion, $mismoBarco)) {
                if ($mismoBarco) {
                    $casillas[$contador] = [$abscisas, $ordenadas];
                    $contador++;
                    ($orientacion == HORIZONTAL) ? $abscisas++ : $ordenadas++;
                } else {
                    $tablero[$abscisas][$ordenadas] = $tipoBarco;
                }
                $tamanyoBarco--;
                $error = ($tamanyoBarco > 0 && ($abscisas == 9 || $ordenadas == 9)) ? true : false;
            } else {
                $error = true;
            }
            if ($error) {
                $tamanyoBarco = $tipoBarco;
                unset($casillas);
            }
        } while ($tamanyoBarco > 0 && !$error);
    } while ($error);
    while (!empty($casillas)) {
        foreach ($casillas as $casilla => $valor) {
            $tablero[$valor[0]][$valor[1]] = $tipoBarco;
        };
        unset($casillas);
    };
    return $tablero;
}

if (empty($_POST)) {
    $tablero = [];
    $barcos = [1, 1, 1, 2, 2, 3];
    $numeroImpactos = 0;
    foreach ($barcos as $tipoBarco) {
        $tablero = colocarBarcos($tablero, $tipoBarco);
    }
    include 'vistas/tablero.php';
} elseif (isset($_POST['boton_jugar'])) {
    $tablero = $_POST['tablero'];
    $disparo = $_POST['disparo'];
    $numeroImpactos = $_POST['impactos'];
    if (comprobarNumeroDisparos($disparo)) {
        $datosDelJuego = comprobarDisparos($disparo, $tablero, $numeroImpactos);
        if ($datosDelJuego[1] < 10) {
            $disparo = $datosDelJuego[0];
            $numeroImpactos = $datosDelJuego[1];
            include 'vistas/tablero.php';
        } else {
            include 'vistas/ganador.php';
        }
    } else {
        echo "<h1>Solo puede realizar un disparo por turno!</h1><br>";
        include 'vistas/tablero.php';
    }
} elseif (isset($_POST['nueva_partida'])) {
    header('Location: index.php');
}
    