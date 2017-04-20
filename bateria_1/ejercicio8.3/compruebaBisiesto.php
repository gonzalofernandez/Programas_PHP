<?php
if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $anyo = (int)$_POST['anyo'];
    if (date("L", mktime(0, 0, 0, 1, 1, $anyo))) {
        $msg = "El año ".$anyo." es bisiesto,";
    } else {
        $msg = "El año ".$anyo." no es bisiesto,";
    }
    $anyo++;
    $contador = 1;
    while (!date("L", mktime(0, 0, 0, 1, 1, $anyo))) {
        $anyo++;
        $contador++;
    }
    echo $msg." Faltan ".$contador." años para el siguiente año bisiesto.";
}
?>