<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de Registro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <h1> Formulario de Registro de Cliente </h1>
        <div class="capaform">

            <form class="form-font" name="Formregistro" 
                  action="ProcesaFormulario.php" method="GET">
                <div class="form-section">
                    <label for="nombre"> Nombre: </Label> 
                    <input id="nombre" type="text"  required = "required" name="nombre" size="30" /> 
                </div>
                <div class="form-section">
                    <label for="contrasenia"> Contraseña: </Label> 
                    <input id="contrasenia" type="password"  required = "required" name="contrasenia" size="20"/> 
                </div>
                <div class="form-section">
                    <label for="fechanac"> Fecha de Nacimiento: </Label> 
                    <input id="fechanac" type="date"  required = "required" name="fecha">
                </div>
                <div class="form-section">
                    <label for="nomtienda"> Tienda: </Label> 
                    <select id="nomtienda" name="poblacion">
                        <option value="Madrid">Madrid</option>
                        <option value="Barcelona">Barcelona</option>
                        <option value="Valencia">Valencia</option>
                    </select> 
                </div>
                <div class="form-section">
                    Edad: 
                    <label for="m25"> Menor de 25 </Label>
                    <input id="m25" type="radio" name="edad" value="Menor 25" /> 
                    <label for="e25-50"> Entre 25 y 50 </Label>
                    <input id="e25-50" type="radio" name="edad" value="Entre 25 y 50" /> 
                    <label for="M50"> Mayor de 50 </Label>
                    <input id="M50" type="radio" name="edad" value="Mayor 50" /> 
                </div>
                <div class="form-section">
                    <input id="suscripcion" type="checkbox"  name="suscripcion"
                            checked="checked"/> 
                    <label for="suscripcion"> Suscripción a la revista semanal </label>
                </div>
                <input class="submit" type="submit" 
                       value="Enviar" name="botonenvio" /> 
            </form>   
        </div>
    </body>
</html>