<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conversor de Divisas</title>
    </head>
    <body>
        <form name="Introducirdatos" action="convertirDivisas.php" method="POST">                
            <label for="dinero">Introduce la cantidad de dinero: </Label> 
            <input id="dinero" type="text" name="datos[cantidad]" size="5" required="required">
            <label for="divisaI"/>
            <select id="divisaI" name="datos[divisaInicial]">
                <option value="eur">EUROS(eur)</option>
                <option value="usd">DOLARES AMERICANOS(usd)</option>
                <option value="gbp">LIBRA ESTERLINA(gbp)</option>
                <option value="cny">YUANES(cny)</option>
            </select>
            <br/>
            <h2>Señala a que divisa quieres convertir</h2>
            <input id="eur" type="radio" name="datos[divisaFinal]" value="eur" checked/>
            <label for="eur">EUROS(eur)</Label><br/>
            <input id="usd" type="radio" name="datos[divisaFinal]" value="usd"/>
            <label for="usd">DOLARES AMERICANOS(usd)</Label><br/>
            <input id="gbp" type="radio" name="datos[divisaFinal]" value="gbp"/>
            <label for="gbp">LIBRA ESTERLINA(gbp)</Label><br/>
            <input id="cny" type="radio" name="datos[divisaFinal]" value="cny"/>
            <label for="cny">YUANES(cny)</Label><br/>           
            <br/>
            <input type="submit" value="Enviar" name="botonenvio"> 
        </form>
    </body>
</html>