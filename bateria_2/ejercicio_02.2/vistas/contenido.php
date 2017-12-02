<!DOCTYPE html>
<html>
    <head>
        <title>Contenido del usuario</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Contenido del usuario</h1>
        <img src="<?= $url ?>" alt="Tikal_Giaguaro">
        <h5><?= $nombreCuadro ?> de <?= $pintor ?></h5>
        <form name="FormLogout" action="index.php" method="POST">
            <input type="submit" value="logout" name="botonenviologout"/> 
        </form>
    </body>
</html>
