<?php
if (!isset($_POST['botonenvio'])) 
{
    header('Location: index.php');
} else 
{
    $datosFormulario = $_POST['datos'];
    $cantidad = $datosFormulario['cantidad'];
    $divIni = $datosFormulario['divisaInicial'];
    $divFin = $datosFormulario['divisaFinal'];
    //Validación de datos
    if (!is_numeric($cantidad))
    {
        echo "No has introducido un número";
        include 'index.php';
    } else 
    {
        //Pasamos a euros la cantidad introducida
        switch ($divIni) 
        {
            case 'usd': $enEuros = $cantidad / 1.1353;
                break;
            case 'gbp': $enEuros = $cantidad / 0.7352;
                break;
            case 'cny': $enEuros = $cantidad / 7.2133;
                break;
            default: $enEuros = $cantidad;
                break;
        }
        //Convertimos a la divisa final solicitada
        switch ($divFin)
        {
            case 'usd': $cantidadFinal = $enEuros * 1.1353;
                break;
            case 'gbp': $cantidadFinal = $enEuros * 0.7352;
                break;
            case 'cny': $cantidadFinal = $enEuros * 7.2133;
                break;
            default: $cantidadFinal = $enEuros;
                break;
        }
        echo $cantidad." ".$divIni." equivalen a: ".$cantidadFinal." ".$divFin."<br/>";
    }
}     
?>
