<?php

/**
 * Description of Pintor
 *
 * @author Gonza
 */
class Pintor {

    //Propiedades
    private $nombrePintor;

    //Constructor
    function __construct($nombrePintor = "") {
        $this->nombrePintor = $nombrePintor;
    }

    //Métodos de la clase

    static function getPintorByName($nombrePintor) {
        //Recuperamos laconexión
        $dbh = BD::getConexion();
        //Preparamos la sentencia
        $stmt = $dbh->prepare("SELECT * FROM pintores WHERE nombrePintor = :nombre");
        //Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pintor');
        //Ejecutamos la sentencia y el Bind al mismo tiempo
        $stmt->execute([':nombre' => $nombrePintor]);
        //Comprobamos si las credenciales existen en la bbdd
        if ($pintor = $stmt->fetch()) {
            $pintor->cuadros = Cuadro::crearColeccionCuadrosPintor($pintor->idPintor);
            return $pintor;
        }
    }

    static function obtenerCuadroAleatorio($pintor) {
        $cuadros = $pintor->cuadros;
        return $cuadros->getObjectByIterateNum(
                        mt_rand(0, $cuadros->getNumObjects() - 1));
    }

    //Getters

    function getNombrePintor() {
        return $this->nombrePintor;
    }

    function getCuadros() {
        return $this->cuadros;
    }

    function getIdPintor() {
        return $this->idPintor;
    }

    //Setters

    function setNombrePintor($nombrePintor) {
        $this->nombrePintor = $nombrePintor;
    }

}
