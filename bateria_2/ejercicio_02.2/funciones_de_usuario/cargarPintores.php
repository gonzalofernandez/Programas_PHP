<?php

//Función que genera los pintores
function cargarPintores($pintores, $cuadros) {
    //Creamos y llenamos la colección de pintores
    $coleccionPintores = new Collection;
    array_map(function ($pintor) use ($coleccionPintores, $cuadros) {
        $coleccionPintores->add(
                new Pintor($pintor, anyadirCuadrosPintor($pintor, $cuadros)));
    }, $pintores);
    return $coleccionPintores;
}
