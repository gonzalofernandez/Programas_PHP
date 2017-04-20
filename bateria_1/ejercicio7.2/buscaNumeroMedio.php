<?php

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $errorEntrada = false;
    $mensajeError1 = "Has introducido caracteres no numéricos";
    $mensajeError2 = "Has introducido menos de 3 números distintos";
    $numeros = $_POST['numeros'];
    $numero = strtok($numeros, ",");
    $numerosDiferentes = [];
    $i = 0;
    while ($numero && !$errorEntrada) {
        if (is_numeric($numero)) {
            $numerosDiferentes[] = (int) $numero;
            $i++;
            $numero = strtok(",");
        } else {
            $errorEntrada = true;
        }
    }
    if ($errorEntrada == true) {
        echo $mensajeError1;
    } else {
        if (($errorEntrada == false) && (count(array_count_values($numerosDiferentes)) >= 3)) {
            sort($numerosDiferentes);
            $numerosNoRepetidos = array_unique($numerosDiferentes);
            array_shift($numerosNoRepetidos);
            array_pop($numerosNoRepetidos);
            foreach ($numerosNoRepetidos as $key => $value) {
                echo $value;
            }
        } else {
            echo $mensajeError2;
        }
    }
}
?>