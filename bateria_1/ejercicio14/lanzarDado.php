<?php

function lanzarDado() {
    return $tirada = rand(1, 6);
}

if (!isset($_POST['boton_lanzar'])) {
    header('Location: index.php');
} else {
    $tiradas = [];
    $numeroTiradas = $_POST['numero_tiradas'];
    for ($i = 1; $i <= $numeroTiradas; $i++) {
        $tiradas['tirada' . $i] = lanzarDado();
        echo "La tirada " . $i . " ha sido: " . $tiradas['tirada' . $i] . '<br>';
    }
    $arrayOrdenado = array_count_values($tiradas);
    arsort($arrayOrdenado);
    foreach ($arrayOrdenado as $key => $value) {
        echo 'El número ' . $key . ' ha salido ' . $value . ' vez/veces' . '<br>';
    }
}