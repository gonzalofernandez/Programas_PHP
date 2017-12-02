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

    function __construct($nombre, $clave, $email, $pintor) {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->email = $email;
        $this->pintor = $pintor;
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

}
