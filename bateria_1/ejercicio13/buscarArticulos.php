<?php

function comprobarArticulo($cadena, $articulo) {
    
    return $cadena === $articulo ? true : false;
}

if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $texto = $_POST['texto'];
    $palabras = array_count_values(explode(" ", $texto));
    foreach ($palabras as $key => $value) {
        if ($key == "el" || $key == "la" || $key == "los" || $key == "las") {
            echo $key .' => '.$value.'<br>';
        }
    }
    /*$articulos = 'el la los las';
    $i = 0;
    $key = "";
    $value = "";
    $vectorNumeroArticulos = [];
    $iguales = false;
    $vectorArticulos = explode(" ", $articulos);
    $palabra = strtok($texto, " \n\t.,:;");
    while ($palabra) {
        while (($i <= count($vectorArticulos) - 1) && !$iguales) {
            if (comprobarArticulo($palabra, $vectorArticulos[$i])) {
                $vectorNumeroArticulos[$vectorArticulos[$i]]++;
                $iguales = true;
            } else {
                $i++;
            }
        }
        $i = 0;
        $iguales = false;
        $palabra = strtok(" \n\t.,:;");
    }
    foreach ($vectorNumeroArticulos as $key => $value) {
        echo 'Hay '.$value.' artículo/s: '.$key.'<br>';
    }*/
}
?>
