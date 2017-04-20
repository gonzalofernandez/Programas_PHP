<?php

if (empty($_POST)) {
    include 'introducirEquipos.php';
} else {
    if (isset($_POST['boton_enviar_equipos'])) {
        $equipos = $_POST['equipos'];
        include 'pedirResultados.php';
    } else {
        include 'mostrarPartidos.php';
    }
}
?>