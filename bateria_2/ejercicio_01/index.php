<?php

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
//Comprobamos si ya existe la partida
if (isset($_REQUEST['boton_nueva_partida'])) {
    //Inicializamos la partida y el número de intentos 
    session_unset();
    session_destroy();
    setcookie(session_name(), '', 0, '/');
} elseif (isset($_REQUEST['numero_jugado'])) {
    //Comprobamos que se ha introducido un número válido
    $validacionNumeroJugado = filter_input(
            INPUT_POST, 'numero_jugado', FILTER_VALIDATE_INT, ['options' => ['min_range' => RANGO_MINIMO, 'max_range' => RANGO_MAXIMO]]
    );
    if (!$validacionNumeroJugado) {
        $fallo = true;
    } else {
        //Generamos el número secreto si aún no existe
        $_SESSION['numero_secreto'] = isset($_SESSION['numero_secreto']) ?
                $_SESSION['numero_secreto'] : mt_rand(RANGO_MINIMO, RANGO_MAXIMO);
        //Comprobamos si hay ganador
        $ganador = $_REQUEST['numero_jugado'] <=> $_SESSION['numero_secreto'];
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
    $_SESSION['intentos'] = isset($_SESSION['intentos']) ? ++$_SESSION['intentos'] : 1;
}
//Redirigimos al archivo correspondiente
include 'formularioEntrada.php';
