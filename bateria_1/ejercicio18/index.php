<?php
define("JUGADOR", "x");
define("CPU", "o");
define("MENSAJE_GANADOR", "Enhorabuena, has ganado.");
define("MENSAJE_PERDEDOR", "Lo siento, has perdido.");
define("MENSAJE_TABLAS", "No quedan más opciones.");
function comprobarColumnas($tablero, $jugador) {
    $partidaGanada = false;
    $columnas[0] = array_column($tablero, 0);
    $columnas[1] = array_column($tablero, 1);
    $columnas[2] = array_column($tablero, 2);
    foreach ($columnas as $indice => $casillas) {
        if (comprobarCasillas($casillas, $jugador)) {
            $partidaGanada = true;
        }
    }
    return $partidaGanada;
}

function comprobarCasillas($casillas, $jugador) {

    return $casillas[0] === $jugador && $casillas[1] === $jugador && $casillas[2] === $jugador;
}

function comprobarGanador($tablero, $jugador) {
    $partidaGanada = false;
    foreach ($tablero as $fila => $casillas) {
        if (comprobarCasillas($casillas, $jugador)) {
            $partidaGanada = true;
            break;
        }
    }
    if (!$partidaGanada) {
        for ($i=0; $i<3; $i++) {
            if (comprobarCasillas(array_column($tablero, $i), $jugador)) {
                 $partidaGanada = true;
            }
        }
    }
    //Comprobar diagonales
    if (!$partidaGanada) {
        $partidaGanada = ($tablero[0][0] == $jugador && $tablero[1][1] == $jugador && $tablero[2][2] == $jugador) ||
                ($tablero[0][2] == $jugador && $tablero[1][1] == $jugador && $tablero[2][0] == $jugador);
    }
    return $partidaGanada;
}

function comprobarJugadasRestantes($tablero) {
    $jugadaPosible = false;
    foreach ($tablero as $key => $casillas) {
        if ($casillas[0] === "" || $casillas[1] === "" || $casillas[2] === "" && !$jugadaPosible) {
            $jugadaPosible = true;
        }
    }
    return $jugadaPosible;
}

function jugarCpu($tablero) {
    $jugadaCpu = false;
    foreach ($tablero as $key1 => $casillas) {
        foreach ($casillas as $key2 => $valor) {
            if ($valor === "" && !$jugadaCpu) {
                $tablero[$key1][$key2] = "o";
                $jugadaCpu = true;
            }
        }
    }
    return $tablero;
}

if (empty($_POST['boton_jugar'])) {
    include 'vistas/tableroVacio.php';
} else {
    if ($_POST['boton_jugar']) {
        $tablero = $_POST['tablero'];
        $ganador = comprobarGanador($tablero, JUGADOR);
        if (!$ganador) {
            $jugadasRestantes = comprobarJugadasRestantes($tablero);
            if (!$jugadasRestantes) {
                $mensaje = MENSAJE_TABLAS;
                include 'vistas/final.php';
            } else {
                $tablero = jugarCpu($tablero);
                if (comprobarGanador($tablero, CPU)) {
                    $mensaje = MENSAJE_PERDEDOR;
                    include 'vistas/final.php';
                } else {
                    include 'vistas/tableroEnJuego.php';
                }
            }
        } else {
            $mensaje = MENSAJE_GANADOR;
            include 'vistas/final.php';
        }
    }
}
    