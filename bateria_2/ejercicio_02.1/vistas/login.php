<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Formulario de Login de Cliente</h1>
        <form name="Formlogin" action="index.php" method="POST">
            <label for="nombre">Nombre:</Label>
            <input id="nombre" type="text" name="nombre" size="30"/><br>
            <label for="contrasenia">Contraseña:</Label>
            <input id="contrasenia" type="password" name="contrasenia" size="20"/><br>
            <input type="submit" value="Enviar" name="botonenviologin"/><br><br>
            <label for="boton_registro">Pulse para registrarse</Label>
            <input id="boton_registro" name="boton_registro" type="submit" value="Registro">
        </form>
        <?php
        if (isset($error)) {
            ?>
            <h1><?= constant('ERROR_MESSAGE') ?></h1>
            <?php
        }
        ?>
    </body>
</html>
