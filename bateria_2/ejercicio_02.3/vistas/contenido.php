<!DOCTYPE html>
<html>
    <head>
        <title>Contenido del usuario</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Contenido del usuario</h1>
        <h3>Hola <?= $nombreUsuario ?></h3>
        <img src="<?= $url ?>" alt="Imagen de cuadro">
        <h5><?= $nombreCuadro ?> de <?= $pintor ?></h5>
        <form name="FormLogout" action="index.php" method="POST">
            <input type="submit" value="Logout" name="botonenviologout"/>
            <input type="submit" value="Editar perfil" name="boton_editar"/>
            <input type="submit" value="Borrar perfil" name="boton_baja"/>
        </form>
    </body>
</html>
