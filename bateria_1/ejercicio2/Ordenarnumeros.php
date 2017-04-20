<?php
    /*
     * Introduce los indices(y sus valores) del array 'datos'
     *  en la variable '$datos'
     */
    $datos = $_POST['datos'];
    /*
     * Asigna los valores de cada índice del array guardado en '$datos' 
     *  en variables distintas  
     */
    $numero1 = $datos['num1']; 
    $numero2 = $datos['num2'];
    $numero3 = $datos['num3'];
    
    $secreto = rand($numero1, $numero2); //Generación del número secreto
?>
<!DOCTYPE html>
<html>
    <head>   
        <title>Adivina el numero secreto</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <h1>Informe del sorteo</h1> <br/> <br/>
        <?php
            if ($secreto == $numero3) { //Comprueba si has acertado el número secreto
        ?>
                <h2>ENHORABUENA !!! has acertado el numero secreto</h2>
        <?php
            } else {
        ?>
                <h2>No has acertado el numero secreto</h2>
        <?php
            }
        ?>
        <br/> <br/>
        <h2>
            El numero secreto introducido por usted era: <em><?php echo $numero3 ?></em><br/>
            El numero secreto era: <em><?php echo $secreto ?></em><br/>
            <?php
                if ($numero3 > $secreto) { //Comprueba si el número secreto es mayor o menor que el introducido
            ?>
            El numero elegido por usted es MAYOR que el numero secreto.<br/>
            <?php
                } elseif($numero3 < $secreto) {
            ?>
            El numero elegido por usted es MENOR que el numero secreto.<br/>
            <?php
                }
            ?>
        </h2>
        <?php
            if ($secreto != $numero3) { // Comprueba de si debe o no aparecer el botón 'juego nuevo' 
        ?>
        <!--Botón para volver a jugar-->
        <form action="index.php">
            <input type="submit" value="Juego nuevo">
        </form>
        <?php
            }
        ?>
    </body>
</html>