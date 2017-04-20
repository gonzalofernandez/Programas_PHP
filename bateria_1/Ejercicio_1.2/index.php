<?php
if (!isset($_POST['botonenvio'])) {
    ?>
    <html>
        <head>
            <title>Formulario de Registro</title>
            <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
        </head>
        <body>
            <h1> Formulario de Registro de Cliente </h1>
            <form class = "form-font" name = "Formregistro" method = "POST">
                <label for = "nombre"> Nombre: </Label>
                <input id = "nombre" type = "text" required = "required" name = "datos[nombre]" size = "30" /><br>
                <label for = "contrasenia"> Contraseña: </Label>
                <input id = "contrasenia" type = "password" required = "required" name = "datos[contrasenia]"
                       size = "20"/><br>
                <label for = "fechanac"> Fecha de Nacimiento: </Label>
                <input id = "fechanac" type = "date" required = "required" name = "datos[fecha]"><br>
                <label for = "nomtienda"> Tienda: </Label>
                <select id = "nomtienda" name = "datos[poblacion]">
                    <option value = "Madrid">Madrid</option>
                    <option value = "Barcelona">Barcelona</option>
                    <option value = "Valencia">Valencia</option>
                </select><br>
                Edad:
                <label for = "m25"> Menor de 25 </Label>
                <input id = "m25" type = "radio" name = "datos[edad]" value = "Menor 25" />
                <label for = "e25-50"> Entre 25 y 50 </Label>
                <input id = "e25-50" type = "radio" name = "datos[edad]" value = "Entre 25 y 50" />
                <label for = "M50"> Mayor de 50 </Label>
                <input id = "M50" type = "radio" name = "datos[edad]" value = "Mayor 50" /><br>
                <input id = "suscripcion" type = "checkbox" name = "datos[suscripcion]"
                       checked = "checked"/>
                <label for = "suscripcion"> Suscripción a la revista semanal </label><br>
                <input class = "submit" type = "submit"
                       value = "Enviar" name = "botonenvio"/>
            </form>
        </body>
    </html>
    <?php
} else {
    $datos = $_POST['datos'];
    $nombre = htmlspecialchars($datos['nombre']);
    $contrasenia = htmlspecialchars($datos['contrasenia']);
    $fechanac = htmlspecialchars($datos['fecha']);
    $nomtienda = htmlspecialchars($datos['poblacion']);
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
            <?php if (isset($edad)) { ?>Edad: <?php echo $edad ?><br/><?php } ?>
            Suscripción: <?php echo $suscripcion ?>
        </body>
    </html>
<?php } ?>