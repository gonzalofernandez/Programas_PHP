<?php

define("NUMEROS", [1, 2, 3, 4, 5, 6, 7, 8, 9]);

function elegirNumeros($numeros) {
    $numerosEnJuego = [];
    for ($i = 0; $i <= 4; $i++) {
        $numero = rand(1, 9);
        if (!in_array($numero, $numerosEnJuego)) {
            $numerosEnJuego[] = $numero;
        } else {
            $i--;
        }
    }
    return $numerosEnJuego;
}

function iniciarJuego($numeros) {
    $numerosEnJuego = elegirNumeros($numeros);
    $indice = 0;
    $panelJugado = [];
    while (isset($numerosEnJuego[$indice])) {
        for ($j = 1; $j <= 2; $j++) {
            $fila = rand(0, 9);
            $columna = rand(0, 9);
            if (empty($panelJugado[$fila][$columna])) {
                $panelJugado[$fila][$columna] = $numerosEnJuego[$indice];
            } else {
                $j--;
            }
        }
        $indice++;
    }
    return $panelJugado;
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

function comprobarJugada($tablero, $panelJugado) {
    foreach ($tablero as $fila => $columnas) {
        foreach ($columnas as $columna => $valor) {
            if ($tablero[$fila][$columna] === "X" &&
                isset($panelJugado[$fila][$columna])) {
                $tablero[$fila][$columna] = $panelJugado[$fila][$columna];
            }
        }
    }
    return $tablero;
}

function comprobarEspaciosVacios($tablero) {
    foreach ($tablero as $fila => $columnas) {
        foreach ($columnas as $columna => $valor) {
            if (empty($tablero[$fila][$columna])) {
                $espaciosVacios = true;
            }
        }
    }
    return $espaciosVacios;
}

if (empty($_POST) || isset($_POST['nueva_partida'])) {
    $panelJugado = iniciarJuego(NUMEROS);
    include 'vistas/panel.php';
} elseif (isset($_POST['boton_listo'])) {
    if (isset($_POST['recordatorio'])) {
        $recordatorio = $_POST['recordatorio'];
        $tablero = $_POST['tablero'];
    } else {
        $tablero = [];
    }
    $panelJugado = $_POST['panel'];
    include 'vistas/tablero.php';
} elseif (isset($_POST['boton_recordatorio'])) {
    $recordatorio = true;
    $panelJugado = $_POST['panel'];
    $tablero = $_POST['tablero'];
    include 'vistas/panel.php';
} else {
    $panelJugado = $_POST['panel'];
    $tablero = $_POST['tablero'];
    if (comprobarNumeroJugadas($tablero)) {
        $tablero = comprobarJugada($tablero, $panelJugado);
        if (comprobarEspaciosVacios($tablero)) {
            include 'vistas/tablero.php';
        } else {
            include 'vistas/final.php';
        }
    } else {
        foreach ($tablero as $fila => $columnas) {
            foreach ($columnas as $columna => $valor) {
                if ($valor === "X") {
                    $tablero[$fila][$columna] = "";
                }
            }
        }
        $error = true;
        include 'vistas/tablero.php';
    }
}