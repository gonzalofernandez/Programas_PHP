<?php
if (!isset($_POST['botonenvio'])) {
    header('Location: index.php');
} else {
    $numeros = $_POST['datos'];
    $num1 = (int)$numeros['numero1'];
    $num2 = (int)$numeros['numero2'];
    $num3 = (int)$numeros['numero3'];
    
    if (($num3 > $num1) && ($num2 > $num1)){
        $numeroMedio = ($num3 > $num2) ? $num2 : $num3;
    } else if (($num1 > $num2) && ($num3 > $num2)) {
        $numeroMedio = ($num3 > $num1) ? $num1 : $num3;
    } else if (($num1 > $num3) && ($num2 > $num3)) {
       $numeroMedio = ($num1 > $num2) ? $num2 : $num1;
    }
    echo $numeroMedio;
}
?>