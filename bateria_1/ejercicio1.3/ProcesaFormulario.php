<?php
    if(!isset($_GET['botonenvio']))
    {
        header('Location: index.php');
    } else {
        $nombre = $_GET['nombre'];
        $contrasenia = $_GET['contrasenia'];
        $fechanac = $_GET['fecha'];
        $nomtienda = $_GET['poblacion'];
        if (isset($_GET['edad'])) {
            $edad = $_GET['edad'];
        } else {
            $edad = "No introducida";
        }
        if (isset($_GET['suscripcion'])) {
            $suscripcion = "Solicitada";
        } else {
            $suscripcion = "No solicitada";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>   
        <title>Datos del Formulario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <style>
            .data {
                color: brown;
                display: block;
            }
        </style>
    </head>
    <body>
        <h1>
            Sus datos son los siguientes: <br/> <br/>
            Nombre: <em class='data'><?php echo $nombre ?></em>
            Contraseña: <em class='data'><?php echo $contrasenia ?></em>
            Fecha de nacimiento: <em class='data'><?php echo $fechanac ?></em>
            Tienda: <em class='data'><?php echo $nomtienda ?></em>
            Edad: <em class='data'><?php echo $edad ?></em>
            Suscripción: <em class='data'><?php echo $suscripcion ?></em>
        </h1>
    </body>
</html>