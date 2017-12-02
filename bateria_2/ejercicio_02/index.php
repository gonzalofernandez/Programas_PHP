<?php

//Recuperamos funciones de usuario para su posterior uso
require 'comprobarCredenciales.php';

//Iniciamos o recuperamos la sesión
session_start();

//Constantes(MODELO)
define('ERROR_MESSAGE', "Las credenciales introducidas no son válidas!!!!");
define('USUARIOS', array(['nombre' => 'pepe', 'clave' => '1234'],
    ['nombre' => 'paco', 'clave' => '5678'],
    ['nombre' => 'maria', 'clave' => '9876']));

//Algoritmo que decide qué vemos por pantalla(CONTROLADOR)
//Comprobamos si ya hay un usuario logado
if (isset($_SESSION['username'])) {
    //Comprobamos si ha pulsado el botón logout
    if (filter_input(INPUT_POST, 'botonenviologout')) {
        //Eliminamos las variables de sesión y las cookies
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    } else {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/contenidoUsuario.php';
    }
} else {
    //Comprobamos si ha pulsado el botón login
    if (filter_input(INPUT_POST, 'botonenviologin')) {
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = trim(filter_input(INPUT_POST, 'contrasenia', FILTER_SANITIZE_STRING));
        //Comprobamos si las credenciales son válidas
        if (comprobarCredenciales($nombre, $contrasenia, USUARIOS)) {
            //Almacenamos el nombre del usuario en la sesión
            $_SESSION['username'] = $nombre;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/contenidoUsuario.php';
        } else {
            $error = true;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/login.php';
        }
    } else {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    }
}