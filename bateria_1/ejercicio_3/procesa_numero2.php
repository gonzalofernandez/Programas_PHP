<?php

if (!isset($_POST['boton_enviar'])) {
    header('Location: index.php');
} else {
    $datos_entrada = (int)$_POST['numero_elegido'];
    $mensaje = false;
    $valor = strtok($datos_entrada, ",");
    while ($valor !== false && !$mensaje) {
        //$a = strlen($valor);
        if (strlen($valor) > 1) {
            $array_valores = str_split($valor);
            if (strpos($valor, "-")) {
                $valores_rango = explode("-", $valor);
                $rango_completo = range($valores_rango[0], $valores_rango[1]);
            } else {
                $mensaje = "Utilice '-' para separar rangos.";
            }
        } elseif ((int) $valor < 1 || (int) $valor > 10) {
            $mensaje = "<h2>Tienes que introducir un numero del 1 al 10</h2>";
        } elseif (!is_numeric($valor)) {
            $mensaje = "<h2>No has introducido un numero</h2>";
        } else {
            if (!$mensaje) {
                $i = 1;
                while ($i < 11) {
                    echo "<table border=1><tr><td width=90>" . $valor . " x " . $i . " = " .
                    $i * $valor . "</td></tr></table>";
                    $i++;
                }
            } else {
                echo $mensaje;
                include 'index.php';
            }
            $valor = strtok(",");
        }
    }
}