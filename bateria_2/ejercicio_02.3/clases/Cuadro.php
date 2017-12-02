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

    function getAutorCuadro() {
        return $this->autorCuadro;
    }

    function getRuta() {
        return $this->ruta;
    }
    
    function setNombreCuadro($nombreCuadro) {
        $this->nombreCuadro = $nombreCuadro;
    }

    function setAutorCuadro($autorCuadro) {
        $this->autorCuadro = $autorCuadro;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

}
