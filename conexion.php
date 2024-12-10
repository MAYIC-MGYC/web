<?php
$conex = mysqli_connect("localhost", "root", "", "formulario");

// Comprobar la conexión
if (!$conex) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
