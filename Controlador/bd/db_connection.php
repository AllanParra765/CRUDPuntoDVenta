<?php
// Información de la base de datos
$host = "localhost"; // nombre del host
$username = "root"; // nombre de usuario de la base de datos
$password = "root"; // contraseña de la base de datos
$dbname = "bd_PuntoDVenta"; // nombre de la base de datos

// Crear una conexión a la base de datos
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
	die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>
