<?php
include "Controlador/sesiones/headerSesion.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleIndex.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <form method="post" action="Controlador/login.php">
            <h2>Login</h2>
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <label for="usertype">Tipo de usuario:</label>
            <select id="usertype" name="usertype">
                <option value="Administrador">Administrador</option>
                <option value="Empleado">Empleado</option>
            </select>
			
            <input class="mt-4 mr-4" type="submit" value="Iniciar sesión">
     
        </form>
    </div>
</body>
<?php
include "Vistas/patials/footerindex.php";
?>
