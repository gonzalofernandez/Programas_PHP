<?php

if (!isset($_POST['boton_enviar'])) {
    header('Location: index.php');
} else {
    $datos = (int) $_POST['numero_elegido'];
    echo "<table border=1>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr><td>" . $datos . " x " . $i . " =</td><td width=50>" . $i * $datos . "</td></tr>";
    }
    echo "</table>";
}