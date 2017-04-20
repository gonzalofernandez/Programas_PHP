
<?php

function colocarPremios() {
    $panelPremios = [];
    $posicion = 0;
    $regalos = ["coche", "lavadora", "viaje", "apartamento", "tablet"];
    while ($posicion <= 4) {
        $fila = rand(0, 4);
        $columna = rand(0, 4);
        if (!isset($panelPremios[$fila][$columna])) {
            $panelPremios[$fila][$columna] = $regalos[$posicion];
            $posicion++;
        }
    }
    return $panelPremios;
}

function comprobarNumeroJugadas($tableroJuego) {
    $numJugadas = 0;
    foreach ($tableroJuego as $fila => $columnas) {
        foreach ($columnas as $columna => $value) {
            if ($value === "X") {
                $numJugadas++;
            }
        }
    }
    return $numJugadas == 1;
}

function comprobarJugada($tableroJuego, $panel, $premiosAcumulados) {
    foreach ($tableroJuego as $fila => $columnas) {
        foreach ($columnas as $columna => $value) {
            if ($value === "X" && isset($panel[$fila][$columna])) {
                $tableroJuego[$fila][$columna] = $panel[$fila][$columna];
                $premiosAcumulados[] = $panel[$fila][$columna];
            } else if ($value === "X") {
                $tableroJuego[$fila][$columna] = "O";
            }
        }
    }
    return [$tableroJuego, $premiosAcumulados];
}

if (empty($_POST) || isset($_POST['nueva_partida'])) {
    $tablero = [];
    $turnosRestantes = 3;
    include 'vistas/tablero.php';
} else if (isset($_POST['boton_jugar'])) {
    $panel = empty($_POST['panelJuego']) ? colocarPremios() : $_POST['panelJuego'];
    $tablero = $_POST['tableroJuego'];
    $turnosRestantes = $_POST['turnos'];
    $premios = isset($_POST['premios_acumulados']) ? $_POST['premios_acumulados'] : [];
    if (!empty($premios)) {
        $premios = explode(",", $premios);
    }
    if (comprobarNumeroJugadas($tablero)) {
        $datos = comprobarJugada($tablero, $panel, $premios);
        $tablero = $datos[0];
        $premios = $datos[1];
        $turnosRestantes--;
        $turnosRestantes === 0 ? include "vistas/final.php" : include "vistas/tablero.php";
    } else {
        for ($i = 0; $i <= 4; $i++) {
            for ($j = 0; $j <= 4; $j++) {
                if ($tablero[$i][$j] === "X") {
                    $tablero[$i][$j] = "";
                }
            }
        }
        $error = true;
        include "vistas/tablero.php";
    }
}
?>