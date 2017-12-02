<?php

/**
 * Description of Partida
 *
 * @author Gonza
 */
class Partida {

    private $numeroSecreto;
    private $intentos;

    function __construct($min, $max) {
        $this->numeroSecreto = mt_rand($min, $max);
        $this->intentos = 0;
    }

    public function getNumeroSecreto() {
        return $this->numeroSecreto;
    }

    public function getIntentos() {
        return $this->intentos;
    }

    public function incrementarIntentos() {
        $this->intentos++;
    }

    public function comprobarApuesta($numeroApostado) {
        return $numeroApostado <=> $this->numeroSecreto;
    }

}
