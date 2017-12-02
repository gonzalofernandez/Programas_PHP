<?php

function anyadirCuadrosPintor($nombrePintor, $cuadros) {
    //Identificamos la colección de cuadros
    $coleccionCuadros = crearColeccionCuadros($cuadros);
    //Creamos la colección de cuadros del pintor
    $cuadrosPintor = new Collection;
    //Buscamos sus cuadros
    while ($cuadro = $coleccionCuadros->iterate()) {
        if ($cuadro->getAutorCuadro() === $nombrePintor) {
            $cuadrosPintor->add($cuadro);
        }
    }
    return $cuadrosPintor;
}
