<?php
// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'usuario', 'contraseña', 'basedatos');

// Obtener el código de barras o QR de la solicitud POST
$codigo = $_POST['codigo'];

// Buscar los datos del producto correspondiente en la base de datos
$query = "SELECT * FROM productos WHERE codigo = '$codigo'";
$resultado = mysqli_query($conexion, $query);
$datos = mysqli_fetch_assoc($resultado);

// Devolver los datos del producto en formato JSON
echo json_encode($datos);
?>
