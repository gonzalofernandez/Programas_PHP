<?php

/**
 * Description of Partida
 *
 * @author Gonza
 */
class Partida {

    //Propiedades
    private $palabraSecreta;
    private $letrasJugadas;
    private $idUsuario;
    private $jugadas;

    //Constructor
    function __construct($palabraSecreta = "", $letrasJugadas = "", $idUsuario = "", $jugadas = "") {
        $this->palabraSecreta = $palabraSecreta;
        $this->letrasJugadas = $letrasJugadas;
        $this->idUsuario = $idUsuario;
        $this->jugadas = $this->setJugadas($dbh, $this->idPartida);
    }

    //Métodos de la clase

    static function getPartidaByIdUsuario($dbh, $idUsuario) {
        //Preparamos la sentencia
        $stmt = $dbh->prepare("SELECT * FROM partidas WHERE idUsuario = :idUsuario");
        //Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Partida');
        //Ejecutamos la sentencia y el Bind al mismo tiempo
        $stmt->execute([':idUsuario' => $idUsuario]);
        //Comprobamos si las credenciales existen en la BBDD
        if ($row = $stmt->fetch()) {
            $row->setJugadas($dbh, $row->getIdPartida());
            return $row;
        }
    }

    //Métodos de los objetos

    function persist($dbh) {
        if (!isset($this->idPartida)) {
            //Preparamos la sentencia
            $stmt = $dbh->prepare(
                    "INSERT INTO partidas (palabraSecreta, letrasJugadas, idUsuario) VALUES (:palabraSecreta, :letrasJugadas, :idUsuario)");
            //Hacemos la asociación y ejecutamos la sentencia al mismo tiempo
            $stmt->execute([
                ':palabraSecreta' => $this->palabraSecreta,
                ':letrasJugadas' => $this->letrasJugadas,
                //TO_DO
                //Averiguar de dónde sacamos el valor del idUsuario
                ':idUsuario' => $this->idUsuario]);
        } else {
            //Preparamos la sentencia
            $stmt = $dbh->prepare(
                    "UPDATE usuarios SET palabraSecreta = :palabraSecreta, letrasJugadas = :letrasJugadas, idUsuario = :idUsuario WHERE idUsuario = :idUsuario");
            //Hacemos la asociación y ejecutamos la sentencia al mismo tiempo
            $stmt->execute([
                ':palabraSecreta' => $this->getPalabraSecreta(),
                ':letrasJugadas' => $this->getLetrasJugadas(),
                ':idUsuario' => $this->getIdUsuario()]);
        }
    }

    function delete($dbh) {
        //Preparamos la sentencia
        $stmt = $dbh->prepare("DELETE FROM usuarios WHERE idUsuario = :idUsuario");
        //Hacemos la asociación y ejecutamos la sentencia al mismo tiempo
        $stmt->execute([':idUsuario' => $this->getIdUsuario()]);
    }

    //Getters

    function getIdPartida() {
        return $this->idPartida;
    }

    function getPalabraSecreta() {
        return $this->palabraSecreta;
    }

    function getLetrasJugadas() {
        return $this->letrasJugadas;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getJugadas() {
        return $this->jugadas;
    }

    //Setters

    function setIdPartida($idPartida) {
        $this->idPartida = $idPartida;
    }

    function setPalabraSecreta($palabraSecreta) {
        $this->palabraSecreta = $palabraSecreta;
    }

    function setLetrasJugadas($letrasJugadas) {
        $this->letrasJugadas = $letrasJugadas;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setJugadas($dbh, $idPartida) {
        $this->jugadas = Jugada::getJugadaByIdPartida($dbh, $idPartida);
    }

}
