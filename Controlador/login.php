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


<?php
include "bd/db_connection.php";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $usertype = $_POST["usertype"];

    // Validar los datos del formulario
    //$sql = "SELECT * FROM usuarios WHERE username='$username' AND usertype='$usertype'";
    $sql = "SELECT * FROM usuarios WHERE username='allan'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        // Obtener el registro del usuario
        $registro = mysqli_fetch_assoc($resultado);

        // Verificar si la contraseña es correcta
        if (password_verify($password, $registro["password_hash"])) {
            // Iniciar sesión
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["usertype"] = $usertype;

            // Redirigir al usuario a la página correspondiente
            if ($usertype == "Administrador") {
                header("Location: ../Vistas/admin.php");
            } else if ($usertype == "Empleado") {
                header("Location: ../Vistas/empleado.php");
            }
        } else {
            // Mostrar una alerta de error si la contraseña es incorrecta
            session_start();
            $_SESSION['alert'] = array(
                'type' => 'danger',
                'message' => 'Nombre de usuario o contraseña incorrectos.'
            );
            header("Location: ../index.php");
            exit();
        }
    } else {
        // Mostrar una alerta de error si no se encuentra el usuario
        session_start();
        $_SESSION['alert'] = array(
            'type' => 'danger',
            'message' => 'Nombre de usuario no localizado.'
        );
        header("Location: ../index.php");
        exit();
    }
}
?>
