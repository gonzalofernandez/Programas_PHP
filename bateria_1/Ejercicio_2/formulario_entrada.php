<?php
/*
 * Verificamos que se accede al documento .php a través del formulario
 */
if (!isset($_POST['boton_enviar'])) {
    header('Location: http://localhost:8000');
} else {
    /*
     * Guardamos en variables los datos del formulario alojados en $_POST 
     */
    $rango_inferior = $_POST['numero_menor'];
    $rango_superior = $_POST['numero_mayor'];
    $numero_jugado = $_POST['prueba_numero'];
    /*
     * Generamos el número secreto y confirmamos que no sea igual a los límites
     *  superior o inferior
     */
    do {
        $numero_aleatotio = mt_rand($rango_inferior, $rango_superior);
    } while ($numero_aleatotio == $rango_inferior || $numero_aleatotio == $rango_superior);
    ?>
    <!--Creamos la página de salida-->
    <html>
        <head>
            <title>Resultado del juego</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head>
        <body>
            <?php
            /*
             * Algoritmo para saber si hemos acertado el número secreto
             */
            if ($numero_aleatotio == $numero_jugado) {
                echo "Enhorabuena, ha acertado el número secreto.";
            } else {
                echo "Lo siento, no ha acertado el número secreto.";
            }
            /*
             * Mostramos el número secreto y el elegido por el usuario
             */
            echo "El número secreto era el " . $numero_aleatotio . ",";
            echo "usted había elegido el " . $numero_jugado . ".";
            /*
             * Informamos de si el número elegido es mayor, menor o igual que
             *  el secreto
             */
            if ($numero_jugado < $numero_aleatotio) {
                echo "El número que has jugado es menor que el secreto";
            } elseif ($numero_jugado > $numero_aleatotio) {
                echo "El número que has jugado es mayor que el secreto";
            } else {
                echo "El número que has jugado es igual que el secreto";
            }
            ?>
            <!--Botón para volver a jugar otra partida-->
            <form action="index.php">
                <input type="submit" value="JUGAR MAS"/>
            </form>
        </body>
    </html>
    <?php
}