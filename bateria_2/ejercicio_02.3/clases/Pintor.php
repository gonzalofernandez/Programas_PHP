<?php

/**
 * Description of Pintor
 *
 * @author Gonza
 */
class Pintor {

    private $nombrePintor;
    private $cuadros;

    function __construct($nombrePintor) {
        $this->nombrePintor = $nombrePintor;
        $this->cuadros = self::crearColeccionCuadrosPintor($nombrePintor);
    }

    static function crearColeccionCuadros() {
        //Creamos y llenamos la colección de cuadros
        $coleccionCuadros = new Collection;
        array_map(function ($cuadro) use ($coleccionCuadros) {
            $coleccionCuadros->add(
                    new Cuadro($cuadro['nombre_cuadro'], $cuadro['autor_cuadro'], $cuadro['ruta']));
        }, CUADROS);
        return $coleccionCuadros;
    }

    static function crearColeccionCuadrosPintor($nombrePintor) {
        //Identificamos la colección de cuadros
        $coleccionCuadros = self::crearColeccionCuadros();
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
