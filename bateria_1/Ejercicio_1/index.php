<html>
    <head>
        <title>Formulario de Registro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1> Formulario de Registro de Cliente </h1>
        <form class="form-font" name="Formregistro" 
              action="procesa_formulario.php" method="GET">
            <label for="nombre"> Nombre: </Label> 
            <input id="nombre" type="text"  required = "required" name="datos[nombre]" size="30" /><br> 
            <label for="contrasenia"> Contraseña: </Label> 
            <input id="contrasenia" type="password"  required = "required" name="datos[contrasenia]" 
                   size="20"/><br> 
            <label for="fechanac"> Fecha de Nacimiento: </Label> 
            <input id="fechanac" type="date"  required = "required" name="datos[fecha]"><br>
            <label for="nomtienda"> Tienda: </Label> 
            <select id="nomtienda" name="datos[poblacion]">
                <option value="Madrid">Madrid</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Valencia">Valencia</option>
            </select><br> 
            Edad: 
            <label for="m25"> Menor de 25 </Label>
            <input id="m25" type="radio" name="datos[edad]" value="Menor 25" /> 
            <label for="e25-50"> Entre 25 y 50 </Label>
            <input id="e25-50" type="radio" name="datos[edad]" value="Entre 25 y 50" /> 
            <label for="M50"> Mayor de 50 </Label>
            <input id="M50" type="radio" name="datos[edad]" value="Mayor 50" /><br> 
            <input id="suscripcion" type="checkbox"  name="datos[suscripcion]"
                   checked="checked"/> 
            <label for="suscripcion"> Suscripción a la revista semanal </label><br>
            <input class="submit" type="submit" 
                   value="Enviar" name="botonenvio"/> 
        </form>   
    </body>
</html>