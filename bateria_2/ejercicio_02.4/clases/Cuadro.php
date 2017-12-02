<?php

/**
 * Description of Cuadro
 *
 * @author Gonza
 */
class Cuadro {

    //Propiedades
    private $nombreCuadro;
    private $idPintor;
    private $ruta;

    //Constructor
    function __construct($nombreCuadro = "", $idPintor = "", $ruta = "") {
        $this->nombreCuadro = $nombreCuadro;
        $this->idPintor = $idPintor;
        $this->ruta = $ruta;
    }

    //Métodos de la clase

    static function crearColeccionCuadrosPintor($idPintor) {
        //Recuperamos la conexión
        $dbh = BD::getConexion();
        //Creamos la colección de cuadros del pintor
        $cuadrosPintor = new Collection;
        //Preparamos la sentencia
        $stmt = $dbh->prepare("SELECT * FROM cuadros WHERE idPintor = :id_pintor");
        //Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Cuadro');
        //Ejecutamos la sentencia y el Bind al mismo tiempo
        $stmt->execute([':id_pintor' => $idPintor]);
        //Leemos los resultados de la búsqueda
        while ($cuadro = $stmt->fetch()) {
            $cuadrosPintor->add($cuadro);
        }
        return $cuadrosPintor;
    }

    //Getters

    function getNombreCuadro() {
        return $this->nombreCuadro;
    }

    function getIdPintor() {
        return $this->idPintor;
    }

    function getRuta() {
        return $this->ruta;
    }

    //Setters

    function setNombreCuadro($nombreCuadro) {
        $this->nombreCuadro = $nombreCuadro;
    }

    function setIdPintor($idPintor) {
        $this->idPintor = $idPintor;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

}
