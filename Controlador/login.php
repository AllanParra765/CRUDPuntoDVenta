<?php
include "sesiones/headerSesion.php";
include "../bd/db_connection.php";

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
