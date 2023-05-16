<?php
//Encabezado de HTML para diseño de alerts con bootstrap
include "../Vistas/partials/headerRegistroControlador.php";
// Conexión a la base de datos
include "bd/db_connection.php";

// Obtener los datos enviados por el formulario
$username = $_POST["username"];
$password = $_POST["password"];
$usertype = $_POST["usertype"];

// Encriptar la contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (username, password_hash, usertype) VALUES ('$username', '$password_hash', '$usertype')";

if (mysqli_query($conn, $sql)) {
    // Mostrar alerta de éxito con icono y redirigir a la página de inicio
    echo '<div class="alert alert-success" role="alert">
              <i class="fas fa-check-circle"></i> Usuario registrado correctamente.
          </div>';
    echo '<script>setTimeout(function(){ window.location.href = "../index.php"; }, 3000);</script>';
} else {
    // Mostrar alerta de error con icono y redirigir a la página de inicio
    echo '<div class="alert alert-danger" role="alert">
              <i class="fas fa-exclamation-circle"></i> Error al registrar el usuario: ' . mysqli_error($conn) . '
          </div>';
    echo '<script>setTimeout(function(){ window.location.href = "../index.php"; }, 3000);</script>';
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
