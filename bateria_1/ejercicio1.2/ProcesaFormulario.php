<?php
    if(!isset($_POST['botonenvio']))
    {
        header('Location: index.php');
    } else {
        $nombre = $_POST['nombre'];
        $contrasenia = $_POST['contrasenia'];
        $fechanac = $_POST['fecha'];
        $nomtienda = $_POST['poblacion'];
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
            <?php
                if (isset($_POST['edad'])) {
                $edad = $_POST['edad']; 
            ?>
                Edad: <em class='data'><?php echo $edad ?></em>
            <?php
                }
                if (isset($_POST['suscripcion'])) {
                $suscripcion = "Solicitada";
            ?>
                Suscripción: <em class='data'><?php echo $suscripcion ?></em>
            <?php
                }
            ?>
        </h1>
    </body>
</html>