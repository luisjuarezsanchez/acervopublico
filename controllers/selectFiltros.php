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


// Verificar la conexión
if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Consulta SQL para obtener las  colecciones del SELECT
$sql = "SELECT TRIM(COLECCION) AS COLECCION FROM `viewDatosPublicos` GROUP BY COLECCION ORDER BY COLECCION";
$result = mysqli_query($conexion, $sql);

// Generar las opciones del select
$options = "";
while ($row = mysqli_fetch_assoc($result)) {
  $coleccion = $row['COLECCION'];
  $options .= "<option value=\"$coleccion\">$coleccion</option>";
}



// Consulta SQL para obtener las  tematicas del SELECT
$sql2 = "SELECT TRIM(TEMATICA) AS TEMATICA FROM `viewDatosPublicos` GROUP BY TEMATICA ORDER BY TEMATICA";
$result2 = mysqli_query($conexion, $sql2);

// Generar las opciones del select
$options2 = "";
while ($row = mysqli_fetch_assoc($result2)) {
  $tematica = $row['TEMATICA'];
  $options2 .= "<option id='tematica' value=\"$tematica\">$tematica</option>";
}


// Consulta SQL para obtener los autores del SELECT
$sql3 = "SELECT TRIM(AUTOR) AS AUTOR FROM `viewDatosPublicos` GROUP BY AUTOR HAVING AUTOR <> '0' ORDER BY AUTOR";
$result3 = mysqli_query($conexion, $sql3);

// Generar las opciones del select
$options3 = "";
while ($row = mysqli_fetch_assoc($result3)) {
  $autor = $row['AUTOR'];
  $options3 .= "<option id='autor' value=\"$autor\">$autor</option>";
}
// Cerrar la conexión
mysqli_close($conexion);

?>