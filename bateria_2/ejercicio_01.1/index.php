<?php

//Clases
require 'clases/Partida.php';

//Iniciamos o recuperamos la sesión
session_start();

//Constantes
define('RANGO_MINIMO', 1);
define('RANGO_MAXIMO', 10);
define('MSG_ERROR', 'El número introducido no está dentro de los límites admitidos');
define('MSG_MAYOR', 'El número introducido es MAYOR que el número secreto');
define('MSG_MENOR', 'El número introducido es MENOR que el número secreto');
define('GANADOR', 'Enhorabuena!!!! Has acertado el número secreto');

//Algoritmo que decide qué vemos por pantalla
//Comprobamos qué botón ha pulsado el jugador
if (isset($_REQUEST['boton_nueva_partida'])) {
    //Borramos datos de partida anterior 
    session_unset();
    session_destroy();
    //setcookie(session_name(), '', 0, '/');
} elseif (isset($_REQUEST['numero_jugado'])) {
    //Generamos el número secreto si aún no existe
    if (!isset($_SESSION['partida'])) {
        $_SESSION['partida'] = new Partida(RANGO_MINIMO, RANGO_MAXIMO);
    }
    //Comprobamos que se ha introducido un número válido
    $validacionNumeroJugado = filter_input(
            INPUT_POST, 'numero_jugado', FILTER_VALIDATE_INT, ['options' => ['min_range' => RANGO_MINIMO, 'max_range' => RANGO_MAXIMO]]
    );
    if (!$validacionNumeroJugado) {
        $fallo = true;
    } else {
        //Comprobamos si hay ganador
        $ganador = $_SESSION['partida']->comprobarApuesta($_REQUEST['numero_jugado']);
        switch ($ganador) {
            case 1:
                $mensaje = MSG_MAYOR;
                break;
            case -1:
                $mensaje = MSG_MENOR;
                break;
            default:
                $mensaje = GANADOR;
                break;
        }
    }
    //Incrementamos el número de intentos
    $_SESSION['partida']->incrementarIntentos();
    $intentos = $_SESSION['partida']->getIntentos();
}
//Redirigimos al archivo correspondiente
include 'introducirNumero.php';
