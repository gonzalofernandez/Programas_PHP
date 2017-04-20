<?php

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $negativo = "no es primo";
    $positivo = "es primo";
    $numeroIntroducido = $_POST['numero'];
    $numero = 2;
    $divisible = false;
    while ($numero < sqrt(numero) && !$divisible) {
        if ($numeroIntroducido % $numero == 0) {
            $divisible = true;
        }
        $numero++;
    }
    $mensaje = $divisores == 2 ? $positivo: $negativo;
    echo $numeroIntroducido." ".$mensaje;
}
?>