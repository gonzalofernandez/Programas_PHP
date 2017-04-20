<?php
if (!isset($_POST['botonenvio'])) 
{
    header('Location: index.php');
} else 
{
    $numero = $_POST['numero'];
    if (!is_numeric($numero))
    {
        echo "No has introducido un número";
        include 'index.php';
    } else 
    {
        $entero = intval($numero);
        $i = $entero;
        $factorial = 1;
        for ($i; $i >= 1; $i--)
        {
            $factorial = $factorial * $i;
        }
        echo "El factorial de ".$numero." es: ".$factorial;
    }
}