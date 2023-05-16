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


<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Agregar los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Agregar la biblioteca de iconos Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Agregar los archivos JS de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Aquí va el contenido de la página -->
    <div class="container">
    <h1 class="text-center">Registro de usuario</h1>

    <form method="post" action="../Controlador/registro.php">
        <div class="form-group">
            <label for="username">Nombre de usuario:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="show-password-btn">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirmar contraseña:</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
            <div class="invalid-feedback">
                Las contraseñas no coinciden.
            </div>
        </div>

        <div class="form-group">
            <label for="usertype">Tipo de usuario:</label>
            <select class="form-control" id="usertype" name="usertype" required>
                <option value="">Seleccione un tipo de usuario</option>
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>

<script>
$(document).ready(function() {
    // Alternar la visualización de la contraseña
    $('#show-password-btn').click(function() {
        var passwordInput = $('#password');
        var passwordFieldType = passwordInput.attr('type');

        if (passwordFieldType === 'password') {
            passwordInput.attr('type', 'text');
        } else {
            passwordInput.attr('type', 'password');
        }
    });

    // Validar las contraseñas al enviar el formulario
    $('form').submit(function() {
        var password = $('#password').val();
        var confirmPassword = $('#confirm-password').val();

        if (password !== confirmPassword) {
            $('#confirm-password').addClass('is-invalid');
            return false;
        }
    });
});
</script>

</body>
</html>
