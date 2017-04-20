<?php

function validarPrimeraLetraMayuscula($palabra) {
    return strtoupper($palabra[0]) === $palabra[0] ? true : false;
    ;
}

function validarLongitudPalabra($palabra) {
    return strlen($palabra) > 7 && strlen($palabra) < 11;
}

function validarNumeroVocales($palabra) {
    $vocales = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
    $palabraConsonantes = str_replace($vocales, "", $palabra);
    return strlen($palabra) - strlen($palabraConsonantes) == 4 ? true : false;
}

function comprobarEro($palabra) {
    return substr($palabra, -3) === "ero" ? true : false;
}

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $texto = $_POST['texto'];
    $palabra = strtok($texto, " \n\t.,:;");
    while ($palabra !== false) {
        if ((validarPrimeraLetraMayuscula($palabra)) && (validarLongitudPalabra($palabra)) && 
                (validarNumeroVocales($palabra)) && (comprobarEro($palabra))) {
            $palabras[] = strtoupper($palabra);
        }
        $palabra = strtok(" \n\t.,:;");
    }
    if (empty($palabras)) {
        echo '<h1>Ninguna de las palabras cumple los requisitos.</h1>';
    } else {
        echo "<p>Las palabras buscadas son: </p>";
        $palabrasValidas = array_count_values($palabras);
        foreach ($palabrasValidas as $key => $value) {
            echo $key . " aparece " . $value . " vez/veces<br>";
        }
        echo "<br>";
        $palabras = array_unique($palabras);
        sort($palabras, SORT_NUMERIC | SORT_STRING);
        echo implode("-", $palabras);
    }
}
?>