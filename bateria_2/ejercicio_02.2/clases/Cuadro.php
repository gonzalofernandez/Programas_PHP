<?php

/**
 * Description of Cuadro
 *
 * @author Gonza
 */
class Cuadro {

    private $nombreCuadro;
    private $autorCuadro;
    private $ruta;

    function __construct($nombreCuadro, $autorCuadro, $ruta) {
        $this->nombreCuadro = $nombreCuadro;
        $this->autorCuadro = $autorCuadro;
        $this->ruta = $ruta;
    }

    function getNombreCuadro() {
        return $this->nombreCuadro;
    }

    function setNombreCuadro($nombreCuadro) {
        $this->nombreCuadro = $nombreCuadro;
    }

    function getAutorCuadro() {
        return $this->autorCuadro;
    }

    function setAutorCuadro($autorCuadro) {
        $this->autorCuadro = $autorCuadro;
    }

    function getRuta() {
        return $this->ruta;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

}
