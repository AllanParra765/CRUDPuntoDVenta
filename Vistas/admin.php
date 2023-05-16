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
<body>
	<!-- Aquí va el contenido de la página -->
    <div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Panel de administración</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="inventarios.php"><i class="fas fa-box"></i>Ventas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#myModal" href="#"><i class="fas fa-plus" data-toggle="modal" data-target="#myModal"></i> Inventario</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="#"><i class="fas fa-chart-bar"></i> Reportes</a>
				</li>
                <li class="nav-item">
					<a class="nav-link"href="registroUsuarios.php"><i class="fas fa-user-plus"></i>Registrar usuario</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
				</li>
			</ul>
		</div>
	</nav>
</div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="id_Producto">ID Producto:</label>
                            <input type="text" class="form-control" id="id_Producto">
                        </div>
                        <div class="form-group">
                            <label for="Nombre_producto">Nombre Producto:</label>
                            <input type="text" class="form-control" id="Nombre_producto">
                        </div>
                        <div class="form-group">
                            <label for="Cantidad_Entradas">Cantidad de Entradas:</label>
                            <input type="text" class="form-control" id="Cantidad_Entradas">
                        </div>
                        <div class="form-group">
                            <label for="Cantidad_Existentes">Cantidad Existentes:</label>
                            <input type="text" class="form-control" id="Cantidad_Existentes">
                        </div>
                        <div class="form-group">
                            <label for="Precio_Compra">Precio de Compra:</label>
                            <input type="text" class="form-control" id="Precio_Compra">
                        </div>
                        <div class="form-group">
                            <label for="Precio_Venta">Precio de Venta:</label>
                            <input type="text" class="form-control" id="Precio_Venta">
                        </div>
                        <div class="form-group">
                            <label for="Comentarios">Comentarios:</label>
                            <textarea class="form-control" id="Comentarios" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
<div class="row">
    <div class="col mb-3">
        <button class="btn btn-info btn-block" type="button">
            <i class="fas fa-search"></i> Buscar Producto
        </button>
    </div>
    <div class="col mb-3">
        <button type="button" class="btn btn-primary btn-block">
            <i class="fas fa-barcode"></i> Escanear Producto
        </button>
    </div>
    <div class="col mb-3">
        <button type="button" class="btn btn-success btn-block">
            <i class="fas fa-save"></i> Registrar Producto
        </button>
    </div>
    <div class="col mb-3">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">
            <i class="fas fa-times"></i> Cerrar
        </button>
    </div>
</div>                    
                </div>
                
            </div>
        </div>
    </div>
</div>


<!--Modal de agregar USUARIO-->
<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroModal">
    Registrar usuario
</button>

<!-- Modal de Registro de Usuario -->
<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registro de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Agregar los archivos JS de Bootstrap y Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>

<script>
$(document).ready(function() {
    // Alternar la visualización de la contraseña
    $('#show-password-btn').click(function() {
        var passwordInput = $('#password');
        var passwordFieldType = passwordInput.attr('type');

        // ...

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








<!-- Agregar los archivos JS de Font Awesome -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>







</body>
</html>


