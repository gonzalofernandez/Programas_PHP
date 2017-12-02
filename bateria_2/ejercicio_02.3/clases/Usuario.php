<?php

/**
 * Description of Usuario
 *
 * @author Gonza
 */
class Usuario {

    private $nombre;
    private $clave;
    private $email;
    private $pintor;

    private static function crearPintor($pintor) {
        return new Pintor($pintor);
    }

    function __construct($nombre, $clave, $email, $pintor) {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->email = $email;
        $this->pintor = self::crearPintor($pintor);
    }

    static function getUsuarioByCredenciales($usuarios, $nombre, $contrasenia) {
        $usuario = $usuarios->findByProperty('nombre', $nombre);
        if ($usuario && $usuario->clave === $contrasenia) {
            return $usuario;
        }
    }

    static function comprobarDatosIncorrectos($contrasenia, $email) {
        return !$contrasenia || !$email;
    }

    function persist($usuarios) {
        $usuarios->add($this);
        $usuarios->resetIterator();
    }

    function delete($usuarios) {
        $usuarios->removeByProperty('nombre', $this->nombre);
        $usuarios->resetIterator();
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

    function getPintor() {
        return $this->pintor;
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

    function setPintor($pintor) {
        $this->pintor = self::crearPintor($pintor);
    }

}
