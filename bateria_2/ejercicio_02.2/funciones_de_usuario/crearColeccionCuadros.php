<?php

function crearColeccionCuadros($cuadros) {
    //Creamos y llenamos la colección de cuadros
    $coleccionCuadros = new Collection;
    array_map(function ($cuadro) use ($coleccionCuadros) {
        $coleccionCuadros->add(
                new Cuadro($cuadro['nombre_cuadro'], $cuadro['autor_cuadro'], $cuadro['ruta']));
    }, $cuadros);
    return $coleccionCuadros;
}
