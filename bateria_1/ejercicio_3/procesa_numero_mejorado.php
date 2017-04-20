<?php

if (!isset($_POST['boton_enviar'])) {
    header('Location: index.php');
} else {
    $datos = $_POST['numero_elegido'];
    //Recopilamos y separamos segun las comas los parametros de entrada
    $numeros = explode(",", $datos);
    //Recorremos todos los datos para saber si hay algun rango que estara separado por '-'
    for ($j = 0; $j < count($numeros); $j++) {
        //Si localiza un rango elimina el guion e identifica los limites del rango
        if (strpos($numeros[$j], "-")) {
            $rango = explode("-", $numeros[$j]);
            $rango_completo = range($rango[0], $rango[1]);
            //Escribimos todos los numeros pertenecientes al rango
            $numeros[$j] = implode(",", $rango_completo);
        }
    }
    //Unimos en una sola cadena todos los numeros
    $secuencia = implode(",", $numeros);
    //Pasamos la cadena a array para poder eliminar repetidos
    $array_de_elementos = explode(",", $secuencia);
    //Eliminamos repetidos
    $elementos_sin_repetidos = array_unique($array_de_elementos);
    //Volvemos a pasar los datos a formato cadena
    $elementos_totales = implode(",", $elementos_sin_repetidos);
    //Tratamos cada numero de la secuencia por separado
    $numero = strtok($elementos_totales, ",");
    //Generamos la tabla para cada numero
    while ($numero) {
        //Comprobar si el dato introducido es un número
        if (!is_numeric($numero)) {
            $mensajError = "<h2>El valor introducido (" . $numero . ") no es un número</h2>";
        }
        //Compruebo si estáentre los valores 1 y 10
        else if ($datos < 1 || $datos > 10) {
            $mensajError = "<h2>El valor introducido (" . $numero . ") no esta entre 1 y 10</h2>";
        }
        //Si se prodice un error en la entrada de dtos lo indico por pantalla 
        //mediante un mensaje y devuelvo a la pagina del formulario
        if (isset($mensajError)) {
            echo $mensajError;
            include ('index.php');
        } else {
            //Si no se produce error muesyro la tabla correspondiente
            echo "<table border=1>";
            for ($i = 1; $i <= 10; $i++) {
                if ($i % 2 == 0) {
                    echo "<tr bgcolor=red>";
                } else {
                    echo "<tr>";
                }
                echo "<td>" . $numero . " x " . $i . " =</td><td width=50>" . $i * $numero . "</td></tr>";
            }
            echo "</table><br>";
        }
        $numero = strtok(",");
    }
}