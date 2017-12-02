<?php

//Función que valida las credenciales introducidas
function comprobarCredenciales($nombre, $contrasenia, $usuarios) {
    return array_filter($usuarios, function($registro) use ($nombre, $contrasenia) {
        return $nombre === $registro['nombre'] &&
                $contrasenia === $registro['clave'];
    });
}
