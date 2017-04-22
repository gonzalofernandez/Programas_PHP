
<?php

$barcos = [3, 2, 2, 1, 1, 1];
$impactosTotales = 10;

function comprobarNumeroImpactos($tablero) {
    $impactosConseguidos = 0;
    foreach ($tablero as $fila => $columnas) {
        foreach ($columnas as $columna => $valor) {
            if (is_numeric($valor)) {
                $impactosConseguidos++;
            }
        }
    }
    return $impactosConseguidos;
}

function comprobarJugada($tablero, $panel) {
    foreach ($tablero as $fila => $columnas) {
        foreach ($columnas as $columna => $valor) {
            if (($tablero[$fila][$columna] === "X") && (isset($panel[$fila][$columna]))) {
                $tablero[$fila][$columna] = $panel[$fila][$columna];
            } elseif (($tablero[$fila][$columna] === "X") && (!isset($panel[$fila][$columna]))) {
                $tablero[$fila][$columna] = "-";
            }
        }
    }
    return $tablero;
}

function comprobarNumeroJugadas($tablero) {
    $numeroJugadas = 0;
    foreach ($tablero as $fila => $columnas) {
        foreach ($columnas as $columna => $valor) {
            if ($valor === "X") {
                $numeroJugadas++;
            }
        }
    }
    return $numeroJugadas === 1;
}

function comprobarEspacios($panel, $fila, $columna, $longitudBarco) {
    if ($longitudBarco === 1) {
        $barcoColacado = (isset($panel[$fila - 1][$columna - 1]) ||
                isset($panel[$fila - 1][$columna]) ||
                isset($panel[$fila - 1][$columna + 1]) ||
                isset($panel[$fila][$columna - 1]) ||
                isset($panel[$fila][$columna + 1]) ||
                isset($panel[$fila + 1][$columna - 1]) ||
                isset($panel[$fila + 1][$columna - 1]) ||
                isset($panel[$fila + 1][$columna - 1])) ? false : true;
    } elseif ($longitudBarco === 2) {
        $barcoColacado = (isset($panel[$fila - 1][$columna - 1]) ||
                isset($panel[$fila - 1][$columna]) ||
                isset($panel[$fila - 1][$columna + 1]) ||
                isset($panel[$fila - 1][$columna + 2]) ||
                isset($panel[$fila][$columna - 1]) ||
                isset($panel[$fila][$columna + 1]) ||
                isset($panel[$fila][$columna + 2]) ||
                isset($panel[$fila + 1][$columna - 1]) ||
                isset($panel[$fila + 1][$columna]) ||
                isset($panel[$fila + 1][$columna + 1]) ||
                isset($panel[$fila + 1][$columna + 2])) ? false : true;
    }
    return $barcoColacado;
}

function crearPanel($barcos) {
    $indice = 0;
    $panel = [];
    while (isset($barcos[$indice])) {
        $fila = rand(0, 9);
        if ($barcos[$indice] === 3) {
            $columna = rand(0, 7);
            $panel[$fila][$columna] = (string) $barcos[$indice];
            $panel[$fila][$columna + 1] = (string) $barcos[$indice];
            $panel[$fila][$columna + 2] = (string) $barcos[$indice];
        } elseif ($barcos[$indice] === 2) {
            $columna = rand(0, 8);
            if (!isset($panel[$fila][$columna]) && comprobarEspacios($panel, $fila, $columna, $barcos[$indice])) {
                $panel[$fila][$columna] = (string) $barcos[$indice];
                $panel[$fila][$columna + 1] = (string) $barcos[$indice];
            } else {
                $indice--;
            }
        } else {
            $columna = rand(0, 9);
            if (!isset($panel[$fila][$columna]) && comprobarEspacios($panel, $fila, $columna, $barcos[$indice])) {
                $panel[$fila][$columna] = (string) $barcos[$indice];
            } else {
                $indice--;
            }
        }
        $indice++;
    }
    return $panel;
}

if (empty($_POST) || isset($_POST['boton_nueva_partida'])) {
    $tablero = [];
    include 'vistas/tablero.php';
} else if (isset($_POST['boton_jugar'])) {
    $panel = (!isset($_POST['panel'])) ? crearPanel($barcos) : $panel = $_POST['panel'];
    $tablero = $_POST['tablero'];
    if (comprobarNumeroJugadas($tablero)) {
        $tablero = comprobarJugada($tablero, $panel);
        if (comprobarNumeroImpactos($tablero) === $impactosTotales) {
            include "vistas/final.php";
        } else {
            include "vistas/tablero.php";
        }
    } else {
        $error = true;
        foreach ($tablero as $fila => $columnas) {
            foreach ($columnas as $columna => $valor) {
                if ($tablero[$fila][$columna] === "X") {
                    $tablero[$fila][$columna] = "";
                }
            }
        }
        include "vistas/tablero.php";
    }
}
?>
    