<?php
// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión u otra página deseada
header("Location: ../index.php");
exit();
?>
