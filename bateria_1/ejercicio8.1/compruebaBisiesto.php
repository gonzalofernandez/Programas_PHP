<?php
if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $anyo = (int)$_POST['anyo'];
    if ($anyo % 4 == 0 || ($anyo % 100 == 0 && $anyo % 400)) {
        echo "El año ".$anyo." es bisiesto.";
    } else {
        echo "El año ".$anyo." no es bisiesto.";
    }
}
?>