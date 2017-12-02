<?php

/**
 * Description of Pintor
 *
 * @author Gonza
 */
class Pintor {

    private $nombrePintor;
    private $cuadros;

    function __construct($nombrePintor, $cuadros) {
        $this->nombrePintor = $nombrePintor;
        $this->cuadros = $cuadros;
    }

    function getNombrePintor() {
        return $this->nombrePintor;
    }

    function getCuadros() {
        return $this->cuadros;
    }

    function obtenerCuadroAleatorio() {
        return $this->cuadros->getObjectByIterateNum(mt_rand(
                                0, $this->cuadros->getNumObjects() - 1));
    }

}
