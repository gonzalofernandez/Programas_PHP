<?php

//Recuperamos funciones de usuario para su posterior uso
require 'funciones_usuario/comprobarCredenciales.php';

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
        //Vaciamos y eliminamos las variables de sesión
        session_unset();
        session_destroy();
        setcookie(session_name(), '', 0, '/');
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    } else {
        $nombreUsuario = $_SESSION['username'];
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/contenidoUsuario.php';
    }
} else {
    //Comprobamos si ha pulsado el botón login
    if (filter_input(INPUT_POST, 'botonenviologin')) {
        //Leemos los datos del formulario
        $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
        $contrasenia = trim(filter_input(INPUT_POST, 'contrasenia', FILTER_SANITIZE_STRING));
        //Creeamos la conexión a la BBDD
        try {
            $db = new PDO('mysql:host=localhost;dbname=usuarios;charset=utf8mb4', 'root', '');
            echo 'Conectado a ' . $db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        } catch (PDOException $ex) {
            echo 'Error conectando a la BBDD. ' . $ex->getMessage();
        }
        //FETCH_ASSOC
        $stmt = $db->prepare("SELECT * FROM credenciales WHERE nombre_usuario = '$nombre'  AND clave = $contrasenia");
        //Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //Ejecutamos
        $stmt->execute();
        //Comprobamos si las credenciales existen en la bbdd
        if ($row = $stmt->fetch()) {
            //Almacenamos el nombre del usuario en la sesión
            $_SESSION['username'] = $row["nombre_usuario"];
            //Cerramos la conexión a bbdd
            $db = null;
            $nombreUsuario = $_SESSION['username'];
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/contenidoUsuario.php';
        } else {
            $error = true;
            //Redirigimos a la vista correspondiente(VISTA)
            include 'vistas/login.php';
        }
    } elseif (filter_input(INPUT_POST, 'boton_registro')) {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/registro.php';
    } else {
        //Redirigimos a la vista correspondiente(VISTA)
        include 'vistas/login.php';
    }
}
