<?php
if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $anyo = (int)$_POST['anyo'];
    $msg1 = "El año ".$anyo." es bisiesto.";
    $msg2 = "El año ".$anyo." no es bisiesto.";
    $salida = date("L", mktime(0, 0, 0, 1, 1, $anyo)) ? $msg1 : $msg2;
    echo $salida;
}
?>