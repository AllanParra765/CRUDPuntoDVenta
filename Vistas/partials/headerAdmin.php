<?php
// Establecer el tiempo límite de la sesión en segundos (por ejemplo, 30 minutos)
$tiempoLimite =90; //1800 30 minutos
session_start();

// Verificar si el usuario tiene el rol de administrador
if ($_SESSION["usertype"] !== "Administrador") {
    // Redirigir a otra página (por ejemplo, página de inicio) si no tiene el rol adecuado
    header("Location: empleado.php");
    exit(); // Detener la ejecución del script
}


// Verificar si hay un mensaje de alerta en la sesión
if (isset($_SESSION['alert'])) {
    // Obtener los detalles de la alerta
    $alertType = $_SESSION['alert']['type'];
    $alertMessage = $_SESSION['alert']['message'];

    // Mostrar la alerta
    echo '<div class="alert alert-' . $alertType . ' alert-dismissible fade show" role="alert">';
    echo $alertMessage;
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '</div>';

    // Limpiar el mensaje de alerta de la sesión
    unset($_SESSION['alert']);
}

// Verificar si hay un tiempo de expiración establecido en la sesión
if (isset($_SESSION['expire'])) {
    // Verificar si ha pasado el tiempo límite desde el último acceso
    $tiempoExpiracion = $_SESSION['expire'];
    if (time() > $tiempoExpiracion) {
        // Destruir la sesión y redirigir al usuario a la página de inicio de sesión
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}
// Establecer el nuevo tiempo de expiración de la sesión
$_SESSION['expire'] = time() + $tiempoLimite;

?>


<!DOCTYPE html>
<html>
<head>
	<title>Panel de administración</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Agregar los archivos CSS de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Agregar los archivos JS de Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Incluir la biblioteca Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>