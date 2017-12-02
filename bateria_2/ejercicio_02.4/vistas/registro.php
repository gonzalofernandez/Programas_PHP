<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de registro</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Formulario de Registro de Cliente</h1>
        <?php
        if (isset($fallo)) {
            ?>
            <h3><?= constant('MENSAJE_FALLO') ?></h3>
            <?php
        }
        ?>
        <form action="index.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input id="nombre" type="text" required="required" name="nombre" size="30" 
                   placeholder="<?= isset($editar) ? $nombre : "Nombre de usuario" ?>"/><br>
            <label for="contrasenia">Contraseña:</label>
            <input id="contrasenia" type="password" required="required" name="contrasenia" 
                   size="20" placeholder="<?= isset($editar) ? $clave : "4 números" ?>"/><br>
            <label for="mail">Correo-e:</label>
            <input id="mail" type="email" required="required" name="mail" size="20" 
                   placeholder="<?= isset($editar) ? $email : "ej@ej.ej" ?>"/><br>
            <label for="pintor">Pintor favorito:</label>
            <select id="pintor" name="pintor">
                <?php
                foreach (PINTORES as $nombrePintor) {
                    ?>
                    <option value="<?= $nombrePintor ?>"><?= $nombrePintor ?></option>
                    <?php
                }
                ?>
            </select><br><br>
            <?php
            if (isset($editar)) {
                ?>
                <label for="boton_nuevos_datos">Pulse para enviar sus nuevos datos</label>
                <input id="boton_nuevos_datos" name="boton_nuevos_datos" type="submit" value="Enviar">    
                <?php
            } else {
                ?>
                <label for="boton_confirmar_registro">Pulse para enviar sus datos</label>
                <input id="boton_confirmar_registro" name="boton_confirmar_registro" type="submit" value="Enviar">
                <?php
            }
            ?>
        </form>
    </body>
</html>
