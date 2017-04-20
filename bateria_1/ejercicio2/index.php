<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulario de entrada de numeros</title>
    </head>
    <body>
        <h1>Adivina numero con 1 intento</h1>
        <div>
            <!--Formulario de entrada de los números del juego,
                 los guardamos en el array 'datos' con los índices
                 'num1', 'num2', y 'num3'-->
            <form name="Formularioentrada" action="Ordenarnumeros.php" method="POST">
                <div>
                    <label for="numero1">Elige un número como limite inferior del rango:</Label> 
                    <input id="numero1" type="text" required = "required" name="datos[num1]" size="30" /> 
                </div>
                <div>
                    <label for="numero2">Elige un número como limite superior del rango:</Label> 
                    <input id="numero2" type="text"  required = "required" name="datos[num2]" size="30"/> 
                </div>
                <div>
                    <label for="numero3">Elige un numero dentro del rango:</Label> 
                    <input id="numero3" type="text"  required = "required" name="datos[num3]" size="30"/> 
                </div>
                <!--Botón para el envio de los datos del formmulario-->
                <input class="submit" type="submit" value="Enviar" name="botonenvio" />
            </form>
        </div>
    </body>
</html>