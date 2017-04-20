<?php

function comprobarNumero($numeroSecreto, $numero) {
    
    return $coincidencia = (int) $numeroSecreto === (int) $numero ? true: false;
}

if (empty($_POST)) {
    include 'vistas/pedirNumeros.php';
} else {
    if (isset($_POST['boton_nuevo_intento'])) {
        if (comprobarNumero($_POST['numero_secreto'], $_POST['nuevo_numero_jugado'])) {
            include 'vistas/acierto.php';
        } else {
            $numeroAleatorio = $_POST['numero_secreto'];
            include 'vistas/fallo.php';
        }
    } else {
        $numeroAleatorio = rand($_POST['limiteInferior'], $_POST['limiteSuperior']);
        if (comprobarNumero($numeroAleatorio, $_POST['numeroSeleccionado'])) {
            include 'vistas/acierto.php';
        } else {
            include 'vistas/fallo.php';
        }
    }
}
