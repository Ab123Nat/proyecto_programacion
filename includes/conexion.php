<?php
$conexion = new mysqli("localhost", "root", "", "proyecto_programacion");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
