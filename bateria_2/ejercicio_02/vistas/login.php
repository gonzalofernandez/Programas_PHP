<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de Login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Formulario de Login de Cliente</h1>
        <form name="Formlogin" action="/index.php" method="POST">
            <label for="nombre">Nombre:</Label>
            <input id="nombre" type="text" required="required" name="nombre" size="30"/><br>
            <label for="contrasenia">Contraseña:</Label>
            <input id="contrasenia" type="password" required="required" name="contrasenia" size="20"/><br>
            <input type="submit" value="Enviar" name="botonenviologin" />
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
