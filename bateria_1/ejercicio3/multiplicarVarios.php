<?php     
    if (!isset($_POST['botonenvio'])) 
    {
        header('Location: index.php');
    } else 
    {
        //Lo primero que deberia hacer es validar datos
        //Si introduzco los numeros separados por separados por un espacio a la derecha o izquierda
        //ddeberia de limpiar con RTRIM o LTRIM
        $cadena_inicial = $_POST['entradadatos'];
        $array_cadena_inicial = explode(",", $cadena_inicial);

        for ($i = 0; $i < count($array_cadena_inicial); $i++)
        {
            if (strpos($array_cadena_inicial[$i], "-"))
            {
                $array_rango = explode("-", $array_cadena_inicial[$i]);
                $crea_rango = range($array_rango[0], $array_rango[1]);
                $array_cadena_inicial[$i] = implode(",", $crea_rango);
            }
        }       
        $cadena_secuencia = implode(",", $array_cadena_inicial);
        $array_sec_completa = explode(",", $cadena_secuencia);
        $ordenado = array_unique($array_sec_completa);
        $sec_ordenada = implode(",", $ordenado);
        $elementos = strtok($sec_ordenada, ",");
        while($elementos !== false) 
        {
            for ($j=1; $j <= 10; $j++)
            {
                echo "<table border='1'>";
                if ($j%2 != 0)
                {
                    echo "<tr bgcolor='grey'>";
                } else
                {
                    echo "<tr bgcolor='white'>";
                }
                echo "<td width='75'>$elementos x $j = ".$elementos * $j."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br/>";
            $elementos = strtok(",");
        }
    }
?>