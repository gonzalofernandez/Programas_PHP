<?php

define('GANADO', 3);
define('EMPATADO', 1);
define('PERDIDO', 0);

function comprobarResultado($golesAFavor, $golesEnContra) {
    if ($golesAFavor === $golesEnContra) {
        $puntos = EMPATADO;
    } else {
        $puntos = ($golesAFavor > $golesEnContra) ? GANADO : PERDIDO;
    }
    return $puntos;
}

if (empty($_POST)) {
    include 'vistas/pedirEquipos.php';
} else {
    if (isset($_POST['boton_enviar_equipos'])) {
        $equipos = $_POST['equipos'];
        $numeroJornada = 0;
        foreach ($equipos as $equipo => $equipoLocal) {
            foreach ($equipos as $equipo => $equipoVisitante) {
                if ($equipoLocal !== $equipoVisitante) {
                    $partidos[$numeroJornada] = [$equipoLocal, $equipoVisitante];
                    $numeroJornada++;
                }
            }
        }
        include 'vistas/pedirResultados.php';
    } else {
        $partidos = $_POST['jornadas'];
        $columnaEquipos = array_column($partidos, 'equipolocal');
        $listaEquipos = array_unique($columnaEquipos);
        foreach ($listaEquipos as $equipo) {
            $clasificacion[$equipo] = ['puntos' => 0, 'goles a favor' => 0, 'goles en contra' => 0, 'gol average' => 0];
            foreach ($partidos as $key => $value) {
                if ($equipo === $value['equipolocal'] || $equipo === $value['equipovisitante']) {
                    if ($equipo === $value['equipolocal']) {
                        $golesAFavor = $value['golescasa'];
                        $golesEnContra = $value['golesvisitante'];
                    }
                    if ($equipo === $value['equipovisitante']) {
                        $golesAFavor = $value['golesvisitante'];
                        $golesEnContra = $value['golescasa'];
                    }
                    $clasificacion[$equipo] = ['puntos' => $clasificacion[$equipo]['puntos'] + comprobarResultado($golesAFavor, $golesEnContra),
                        'goles a favor' => $clasificacion[$equipo]['goles a favor'] + $golesAFavor,
                        'goles en contra' => $clasificacion[$equipo]['goles en contra'] + $golesEnContra,
                        'gol average' => $clasificacion[$equipo]['gol average'] + ($golesAFavor - $golesEnContra)];
                }
            }
        }
        $columnaPuntos = array_column($clasificacion, 'puntos');
        $columnaGolAverage = array_column($clasificacion, 'gol average');
        array_multisort($columnaPuntos, SORT_DESC, $columnaGolAverage, SORT_DESC, $clasificacion);
        include 'vistas/mostrarClasificacion.php';
    }
}
