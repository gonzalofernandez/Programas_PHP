<?php
    if (!isset($_POST['botonenvio'])) 
    {
        header('Location: index.php');
    } else 
    {      
        $cadenaInicial = $_POST['entradadatos'];
        //Comprobar si el valor es numerico
        if (!is_numeric($cadenaInicial)) 
        {
            $mensaje = "<h1>No has introducido un número</h1>";
        } elseif (!($cadenaInicial >= 1 && $cadenaInicial <= 9)) //Comprobamos que este en el rango correcto
        {
            $mensaje = "<h1>No has introducido un rango de números correcto</h1>";
        }
        if (isset($mensaje))
        {
            echo $mensaje;
            include 'index.php';
        } else
        {
            $i = 1;
            while($i <= 10) 
            {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td width='75'>$cadenaInicial x $i = ".$cadenaInicial * $i."</td>";
                echo "</tr>";
                echo "</table>";
                $i++;           
            }            
        }        
    }
?>