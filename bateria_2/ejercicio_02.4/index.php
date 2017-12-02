<?php

//Recuperamos las clases
require_once 'clases/BD.php';
require_once 'clases/Collection.php';
require_once 'clases/Cuadro.php';
require_once 'clases/Pintor.php';
require_once 'clases/Usuario.php';

//Iniciamos o recuperamos la sesión
session_start();

//Iniciamos o recuperamos la conexión con la BBDD
$dbh = BD::getConexion();

//Constantes(MODELO)
define('FORMATO_CONTRASENIA', "/^[0-9]{4}$/");
define('ERROR_MESSAGE', "Las credenciales introducidas no son válidas!!!!");
define('MENSAJE_FALLO', "Ha introducido datos erróneos, vuelva a intentarlo");
define('PINTORES', array('Velazquez', 'Goya', 'Rembrand'));

//Algoritmo que decide qué vemos por pantalla(CONTROLADOR)
//Comprobamos si ya hay un usuario logado
if (isset($_SESSION['username'])) {
    //Leemos los datos de la sesión
    $usuarioLogado = $_SESSION['username'];
    //Comprobamos si ha pulsado el botón logout
    if (filter_input(INPUT_POST, 'botonenviologout')) {
        //Vaciamos y eliminamos las variables de sesión y cookies del navegador
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    } elseif (filter_input(INPUT_POST, 'boton_editar')) {
        //Activamos la bandera para editar
        $editar = true;
        //Obtenemos las propiedades a modificar del usuario logado
        $nombre = $usuarioLogado->getNombre();
        $clave = $usuarioLogado->getClave();
        $email = $usuarioLogado->getEmail();
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/registro.php';
    } elseif (filter_input(INPUT_POST, 'boton_nuevos_datos')) {
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = filter_input(
                INPUT_POST, 'contrasenia', FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => FORMATO_CONTRASENIA]]);
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
            $usuarioLogado->setNombrePintor($pintor);
            //Insertamos el registro en la BBDD con los datos modificados
            $usuarioLogado->persist($dbh);
            //Recuperamos el usuario con los datos modificados
            $usuarioLogado = Usuario::getUsuarioByCredenciales(
                            $dbh, $nombre, $contrasenia);
            //Seleccionamos un cuadro aleatorio del pintor del usuario logado
            $cuadro = Usuario::obtenerCuadroPintorUsuario($usuarioLogado);
            //Identificamos el nombre del usuario logado
            $nombreUsuario = $usuarioLogado->getNombre();
            //Identificamos datos del cuadro
            $nombreCuadro = $cuadro->getNombreCuadro();
            $pintor = $usuarioLogado->getNombrePintor();
            $url = $cuadro->getRuta();
            //Actualizamos el nombre de usuario logado
            $_SESSION['username'] = $usuarioLogado;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/contenido.php';
        }
    } elseif (filter_input(INPUT_POST, 'boton_baja')) {
        //Eliminamos el usuario logado de la BBDD
        $usuarioLogado->delete($dbh);
        //Desconectamos al usuario logado
        unset($_SESSION['username']);
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    } else {
        //Seleccionamos un cuadro aleatorio del pintor del usuario logado
        $cuadro = Usuario::obtenerCuadroPintorUsuario($usuarioLogado);
        //Identificamos el nombre del usuario logado
        $nombreUsuario = $usuarioLogado->getNombre();
        //Identificamos datos del cuadro
        $nombreCuadro = $cuadro->getNombreCuadro();
        $pintor = $usuarioLogado->getNombrePintor();
        $url = $cuadro->getRuta();
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/contenido.php';
    }
} else {
    //Comprobamos si ha pulsado el botón login
    if (filter_input(INPUT_POST, 'botonenviologin')) {
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = trim(
                filter_input(INPUT_POST, 'contrasenia', FILTER_SANITIZE_STRING));
        $usuarioLogado = Usuario::getUsuarioByCredenciales(
                        $dbh, $nombre, $contrasenia);
        if (isset($usuarioLogado)) {
            //Almacenamos el usuario autenticado en la sesión
            $_SESSION['username'] = $usuarioLogado;
            //Seleccionamos un cuadro aleatorio del pintor del usuario logado
            $cuadro = Usuario::obtenerCuadroPintorUsuario($usuarioLogado);
            //Identificamos el nombre del usuario logado
            $nombreUsuario = $usuarioLogado->getNombre();
            //Identificamos datos del cuadro para la vista
            $nombreCuadro = $cuadro->getNombreCuadro();
            $pintor = $usuarioLogado->getNombrePintor();
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
                INPUT_POST, 'contrasenia', FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => FORMATO_CONTRASENIA]]);
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
            $nuevoUsuario = new Usuario($nombre, $contrasenia, $email, $pintor);
            //Insertamos el nuevo registro en la BBDD
            $nuevoUsuario->persist($dbh);
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/login.php';
        }
        //Si es el primer acceso
    } else {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    }
}
//Cerramos la conexión a la BBDD
$dbh = null;
