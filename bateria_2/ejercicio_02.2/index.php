<?php

//Recuperamos las clases
require 'clases/Collection.php';
require 'clases/Cuadro.php';
require 'clases/Pintor.php';
require 'clases/Usuario.php';

//Recuperamos funciones de usuario para su posterior uso
require 'funciones_de_usuario/crearColeccionCuadros.php';
require 'funciones_de_usuario/anyadirCuadrosPintor.php';
require 'funciones_de_usuario/cargarPintores.php';
require 'funciones_de_usuario/comprobarCredenciales.php';

//Iniciamos o recuperamos la sesión
session_start();

//Constantes(MODELO)
define('FORMATO_CONTRASENIA', "/^[0-9]{4}$/");
define('ERROR_MESSAGE', "Las credenciales introducidas no son válidas!!!!");
define('MENSAJE_FALLO', "Ha introducido datos erróneos, vuelva a intentarlo");
define('PINTORES', array('Velazquez', 'Goya', 'Rembrand'));
define('CUADROS', array(
    ['nombre_cuadro' => 'La rendición de Breda', 'autor_cuadro' => 'Velazquez', 'ruta' => 'imagenes/rendicion_de_breda.jpg'],
    ['nombre_cuadro' => 'Las meninas', 'autor_cuadro' => 'Velazquez', 'ruta' => 'imagenes/las_meninas.jpg'],
    ['nombre_cuadro' => 'La fragua de Vulcano', 'autor_cuadro' => 'Goya', 'ruta' => 'imagenes/fragua_de_vulcano.jpg'],
    ['nombre_cuadro' => 'La familia de Carlos IV', 'autor_cuadro' => 'Goya', 'ruta' => 'imagenes/familia_carlos_iv.jpg'],
    ['nombre_cuadro' => 'Autorretrato', 'autor_cuadro' => 'Rembrand', 'ruta' => 'imagenes/autoretrato.jpg'],
    ['nombre_cuadro' => 'Ronda de noche', 'autor_cuadro' => 'Rembrand', 'ruta' => 'imagenes/ronda_de_noche.jpg']
        )
);

//Algoritmo que decide qué vemos por pantalla(CONTROLADOR)
//Comprobamos si ya hay un usuario logado
if (isset($_SESSION['username'])) {
    //Comprobamos si ha pulsado el botón logout
    if (filter_input(INPUT_POST, 'botonenviologout')) {
        //Vaciamos y eliminamos las variables de sesión y cookies del navegador
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    } else {
        //Obtenemos el nombre del usuario que está logado
        $nombre = $_SESSION['username'];
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/contenido.php';
    }
} else {
    //Creamos o recuperamos los pintores del sistema
    $pintores = isset($_SESSION['pintores']) ?
            $_SESSION['pintores'] : cargarPintores(PINTORES, CUADROS);
    //Creamos o recuperamos los usuarios del sistema
    $usuarios = isset($_SESSION['usuarios']) ?
            $_SESSION['usuarios'] : new Collection;
    //Comprobamos si ha pulsado el botón login
    if (filter_input(INPUT_POST, 'botonenviologin')) {
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = trim(filter_input(INPUT_POST, 'contrasenia', FILTER_SANITIZE_STRING));
        //Comprobamos si las credenciales son válidas
        $usuarioLogado = comprobarCredenciales($nombre, $contrasenia, $usuarios);
        if ($usuarioLogado) {
            //Almacenamos el nombre del usuario en la sesión
            $_SESSION['username'] = $usuarioLogado->getNombre();
            //Seleccionamos un cuadro aleatorio del pintor del usuario logado
            $cuadro = $usuarioLogado->getPintor()->obtenerCuadroAleatorio();
            $nombreCuadro = $cuadro->getNombreCuadro();
            $pintor = $cuadro->getAutorCuadro();
            $url = $cuadro->getRuta();
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/contenido.php';
        } else {
            //Activamos la bandera de error
            $error = true;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/login.php';
        }
        //Comprobamos si ha pulsado el botón para registrarse
    } elseif (filter_input(INPUT_POST, 'boton_registro')) {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/registro.php';
        //Comprobamos si ha pulsado el botón para enviar los datos del registro
    } elseif (filter_input(INPUT_POST, 'boton_confirmar_registro')) {
        //Leemos y validamos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = filter_input(INPUT_POST, 'contrasenia', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => FORMATO_CONTRASENIA]]);
        $email = trim(filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL));
        $pintor = trim(filter_input(INPUT_POST, 'pintor', FILTER_SANITIZE_STRING));
        //Comprobamos si alguno de los datos es erróneo
        if (!$nombre || !$contrasenia || !$email || !$pintor) {
            //Activamos la bandera de fallo
            $fallo = true;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/registro.php';
        } else {
            //Creamos y añadimos el nuevo usuario en el array de usuarios
            $usuarios->add(
                    new Usuario($nombre, $contrasenia, $email, $pintores->findByProperty('nombrePintor', $pintor))
            );
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/login.php';
        }
        //Si es el primer acceso
    } else {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    }
    //Guardamos el array de usuarios en la sesión
    $_SESSION['usuarios'] = $usuarios;
    $_SESSION['pintores'] = $pintores;
}
