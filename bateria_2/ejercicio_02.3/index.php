<?php

//Recuperamos las clases
require 'clases/Collection.php';
require 'clases/Cuadro.php';
require 'clases/Pintor.php';
require 'clases/Usuario.php';

//Iniciamos o recuperamos la sesión
session_start();

//Constantes(MODELO)
define('FORMATO_CONTRASENIA', "/^[0-9]{4}$/");
define('ERROR_MESSAGE', "Las credenciales introducidas no son válidas!!!!");
define('MENSAJE_FALLO', "Ha introducido datos erróneos, vuelva a intentarlo");
define('PINTORES', array('Velazquez', 'Rembrand', 'Goya'));
define('CUADROS', array(
    ['nombre_cuadro' => 'La rendición de Breda', 'autor_cuadro' => 'Velazquez', 'ruta' => 'imagenes/rendicion_de_breda.jpg'],
    ['nombre_cuadro' => 'Las meninas', 'autor_cuadro' => 'Velazquez', 'ruta' => 'imagenes/las_meninas.jpg'],
    ['nombre_cuadro' => 'La fragua de Vulcano', 'autor_cuadro' => 'Goya', 'ruta' => 'imagenes/fragua_de_vulcano.jpg'],
    ['nombre_cuadro' => 'La familia de Carlos IV', 'autor_cuadro' => 'Goya', 'ruta' => 'imagenes/familia_carlos_iv.jpg'],
    ['nombre_cuadro' => 'Autorretrato', 'autor_cuadro' => 'Rembrand', 'ruta' => 'imagenes/autoretrato.jpg'],
    ['nombre_cuadro' => 'Ronda de noche', 'autor_cuadro' => 'Rembrand', 'ruta' => 'imagenes/ronda_de_noche.jpg']));

//Algoritmo que decide qué vemos por pantalla(CONTROLADOR)
//Comprobamos si ya hay un usuario logado
if (isset($_SESSION['username'])) {
    //Leemos los datos de la sesión
    $usuarios = $_SESSION['usuarios'];
    $nombreUsuario = $_SESSION['username'];
    //Identificamos al usuario logado y obtenemos sus propiedades
    $usuarioLogado = $usuarios->findByProperty('nombre', $nombreUsuario);
    //Comprobamos si ha pulsado el botón logout
    if (filter_input(INPUT_POST, 'botonenviologout')) {
        //Desconectamos al usuario logado
        //unset($_SESSION['username']);
        //Reseteamos la colección de usuarios
        //$usuarios->resetIterator();
        //Vaciamos y eliminamos las variables de sesión y cookies del navegador
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    } elseif (filter_input(INPUT_POST, 'boton_editar')) {
        //Activamos la bandera para editar
        $editar = true;
        //Obtenemos las propiedades a modificar del usuario registrado
        $clave = $usuarioLogado->getClave();
        $email = $usuarioLogado->getEmail();
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/registro.php';
    } elseif (filter_input(INPUT_POST, 'boton_nuevos_datos')) {
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = filter_input(
                INPUT_POST, 'contrasenia', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => FORMATO_CONTRASENIA]]);
        $email = trim(filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL));
        $pintor = trim(filter_input(INPUT_POST, 'pintor', FILTER_SANITIZE_STRING));
        //Comprobamos si alguno de los datos es erróneo
        if (Usuario::comprobarDatosIncorrectos($contrasenia, $email)) {
            //Activamos la bandera de fallo y la de edición de registro
            $fallo = true;
            $editar = true;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/registro.php';
        } else {
            //Modificamos los datos del usuario logado
            $usuarioLogado->setNombre($nombre);
            $usuarioLogado->setClave($contrasenia);
            $usuarioLogado->setEmail($email);
            $usuarioLogado->setPintor($pintor);
            //Seleccionamos un cuadro aleatorio del pintor del usuario logado
            $cuadro = $usuarioLogado->getPintor()->obtenerCuadroAleatorio();
            //Datos del usuario logado y del cuadro seleccionado
            $nombreUsuario = $usuarioLogado->getNombre();
            $nombreCuadro = $cuadro->getNombreCuadro();
            $pintor = $cuadro->getAutorCuadro();
            $url = $cuadro->getRuta();
            //Actualizamos el nombre de usuario logado
            $_SESSION['username'] = $usuarioLogado->getNombre();
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/contenido.php';
        }
    } elseif (filter_input(INPUT_POST, 'boton_baja')) {
        //Borramos al usuario
        $usuarioLogado->delete($usuarios);
        //Desconectamos al usuario logado
        unset($_SESSION['username']);
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    } else {
        //Seleccionamos un cuadro aleatorio del pintor del usuario logado
        $cuadro = $usuarioLogado->getPintor()->obtenerCuadroAleatorio();
        $nombreCuadro = $cuadro->getNombreCuadro();
        $pintor = $cuadro->getAutorCuadro();
        $url = $cuadro->getRuta();
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/contenido.php';
    }
} else {
    //Creamos o recuperamos los usuarios del sistema
    $usuarios = isset($_SESSION['usuarios']) ?
            $_SESSION['usuarios'] : new Collection;
    //Comprobamos si ha pulsado el botón login
    if (filter_input(INPUT_POST, 'botonenviologin')) {
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = trim(filter_input(INPUT_POST, 'contrasenia', FILTER_SANITIZE_STRING));
        //Comprobamos si las credenciales son válidas
        $usuarioLogado = Usuario::getUsuarioByCredenciales($usuarios, $nombre, $contrasenia);
        if (isset($usuarioLogado)) {
            //Almacenamos el nombre del usuario en la sesión
            $nombreUsuario = $usuarioLogado->getNombre();
            $_SESSION['username'] = $nombreUsuario;
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
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = filter_input(
                INPUT_POST, 'contrasenia', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => FORMATO_CONTRASENIA]]);
        $email = trim(filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL));
        $pintor = trim(filter_input(INPUT_POST, 'pintor', FILTER_SANITIZE_STRING));
        //Comprobamos si alguno de los datos es erróneo
        if (Usuario::comprobarDatosIncorrectos($contrasenia, $email)) {
            //Activamos la bandera de fallo
            $fallo = true;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/registro.php';
        } else {
            //Creamos el objeto del nuevo registro
            $nuevoRegistro = new Usuario($nombre, $contrasenia, $email, $pintor);
            //Insertamos el nuevo registro en la BBDD
            $nuevoRegistro->persist($usuarios);
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/login.php';
        }
        //Si es el primer acceso
    } else {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    }
    //Guardamos la colección de usuarios en la sesión
    $_SESSION['usuarios'] = $usuarios;
}
