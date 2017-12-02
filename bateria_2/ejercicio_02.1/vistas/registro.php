<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Formulario de Login de Cliente</h1>
        <form action="index.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input id="nombre" type="text" required="required" name="nombre" size="30"/><br>
            <label for="contrasenia">Contraseña:</label>
            <input id="contrasenia" type="password" required="required" name="contrasenia" size="20"/><br>
            <label for="mail">Correo-e:</label>
            <input id="mail" type="email" required="required" name="mail" size="20"/><br>
            <label for="pintor">Pintor favorito:</label>
            <select id="pintor" name="pintor">
                <option value="velazquez">Velázquez</option>
                <option value="goya">Goya</option>
                <option value="rembrand">Rembrand</option>
            </select><br><br>
            <label for="boton_confirmar_registro">Pulse para enviar sus datos</label>
            <input id="boton_confirmar_registro" name="boton_confirmar_registro" type="submit" value="Registro">
        </form>
    </body>
</html>
