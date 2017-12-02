<?php

/**
 * Description of Usuario
 *
 * @author Gonza
 */
class Usuario {

    //Propiedades
    private $nombre;
    private $clave;
    private $email;
    private $partidas;

    //Constructor de la clase
    function __construct($nombre = "", $clave = "", $email = "", $partidas = "") {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->email = $email;
        $this->setPartidas($dbh, $this->getIdUsuario());
    }

    //Métodos de la clase

    static function getUsuarioByCredenciales($dbh, $nombre, $clave) {
        //Preparamos la sentencia
        $stmt = $dbh->prepare(
                "SELECT * FROM usuarios WHERE nombre = :nombre AND clave = :clave");
        //Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        //Ejecutamos la sentencia y el Bind al mismo tiempo
        $stmt->execute([':nombre' => $nombre, ':clave' => $clave]);
        //Comprobamos si las credenciales existen en la BBDD
        if ($row = $stmt->fetch()) {
            $row->setPartidas($dbh, $row->getIdUsuario());
            return $row;
        }
    }

    static function comprobarDatosIncorrectos($clave, $email) {
        return !$clave || !$email;
    }

    //Métodos de los objetos de la clase

    function persist($dbh) {
        if (!isset($this->idUsuario)) {
            //Preparamos la sentencia
            $stmt = $dbh->prepare(
                    "INSERT INTO usuarios (nombre, clave, email) VALUES (:nombre, :clave, :email)");
            //Hacemos la asociación y ejecutamos la sentencia al mismo tiempo
            $stmt->execute([
                ':nombre' => $this->nombre,
                ':clave' => $this->clave,
                ':email' => $this->email]);
        } else {
            //Preparamos la sentencia
            $stmt = $dbh->prepare(
                    "UPDATE usuarios SET nombre = :nombre, clave = :clave, email = :email WHERE idUsuario = :idUsuario");
            //Hacemos la asociación y ejecutamos la sentencia al mismo tiempo
            $stmt->execute([
                ':nombre' => $this->getNombre(),
                ':clave' => $this->getClave(),
                ':email' => $this->getEmail()]);
        }
    }

    function delete($dbh) {
        //Preparamos la sentencia
        $stmt = $dbh->prepare("DELETE FROM usuarios WHERE idUsuario = :idUsuario");
        //Hacemos la asociación y ejecutamos la sentencia al mismo tiempo
        $stmt->execute([':idUsuario' => $this->getIdUsuario()]);
    }

    //Getters

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getClave() {
        return $this->clave;
    }

    function getEmail() {
        return $this->email;
    }

    function getPartidas() {
        return $this->partidas;
    }

    //Setters

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPartidas($dbh, $idUsuario) {
        $this->partidas = Partida::getPartidaByIdUsuario($dbh, $idUsuario);
    }

}
