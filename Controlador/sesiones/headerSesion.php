<?php
// Establecer el tiempo límite de la sesión en segundos (por ejemplo, 30 minutos)
$tiempoLimite =90; //1800 30 minutos
session_start();

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
        // Eliminar todas las variables de sesión
        session_unset();
        // Destruir la sesión y redirigir al usuario a la página de inicio de sesión
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}
// Establecer el nuevo tiempo de expiración de la sesión
$_SESSION['expire'] = time() + $tiempoLimite;

?>

