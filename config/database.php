<?php
$servername = "127.0.0.1";
$port = 33069; // Puerto redirigido en el host
$username = "root";
$password = "ripples";
$database = "public"; // Reemplaza con el nombre de tu base de datos

$conexion = new mysqli($servername, $username, $password, $database, $port);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
