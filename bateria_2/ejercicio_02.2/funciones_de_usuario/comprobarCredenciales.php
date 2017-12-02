<?php

//Función que valida las credenciales introducidas
function comprobarCredenciales($nombre, $contrasenia, $usuarios) {
    //Buscamos en cada usuario almacenado las credenciales introducidas
    while ($usuario = $usuarios->iterate()) {
        if ($nombre === $usuario->getNombre() &&
                $contrasenia === $usuario->getClave()) {
            return $usuario;
        }
    }
}
