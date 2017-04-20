<?php
if (!isset($_GET['botonenvio'])) {
    header('Location: http://localhost:8000');
} else {
    $datos = $_GET['datos'];
    $nombre = htmlspecialchars($datos['nombre']);
    $contrasenia = htmlspecialchars($datos['contrasenia']);
    $fechanac = htmlspecialchars($datos['fecha']);
    $nomtienda = htmlspecialchars($datos['poblacion']);
}
if (isset($datos['edad'])) {
    $edad = htmlspecialchars($datos['edad']);
}
if (isset($datos['suscripcion'])) {
    $suscripcion = "Solicitada";
} else {
    $suscripcion = "No solicitada";
}
?>

<!DOCTYPE html>
<html>
    <head>   
        <title>Datos del Formulario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        <h1>Sus datos son los siguientes: </h1>
        Nombre: <?php echo $nombre ?><br/>
        Contraseña: <?php echo $contrasenia ?><br/>
        Fecha de nacimiento: <?php echo $fechanac ?><br/>
        Tienda: <?php echo $nomtienda ?><br/>
        <?php if (isset($edad)) {?>Edad: <?php echo $edad ?><br/><?php } ?>
        Suscripción: <?php echo $suscripcion ?>
    </body>
</html>