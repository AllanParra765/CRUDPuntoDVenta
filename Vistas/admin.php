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
					<a class="nav-link" href="#"  data-toggle="modal" data-target="#myModal"><i class="fas fa-box"></i>Ventas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#myModal" href="#"><i class="fas fa-plus" data-toggle="modal" data-target="#myModal"></i> Inventario</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#reportModal"><i class="fas fa-chart-bar"></i> Reportes</a>
				</li>
                <li class="nav-item">
					<a class="nav-link"href="#" data-toggle="modal" data-target="#registroModal"><i class="fas fa-user-plus"></i>Registrar usuario</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="../Controlador/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
				</li>
			</ul>
		</div>
	</nav>
</div>

    <!-- Modal Registrar Productos-->
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









<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
  <i class="fas fa-plus"></i> Agregar Venta
</button>

<!-- Modal para agregar producto -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Agregar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#removeProductModal">
          <i class="fas fa-plus"></i> Agregar Producto
        </button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#removeProductModal">
          <i class="fas fa-minus"></i> Quitar Producto
        </button>
        
        <!-- Aquí puedes agregar el código para el escáner con Quagga.js -->
        
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#productListModal">
          <i class="fas fa-list"></i> Ver Lista 
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar Compra</button>
        <button type="button" class="btn btn-success" onclick="cobrarCompra()"><i class="fas fa-cash-register"></i> Cobrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para quitar producto -->
<div class="modal fade" id="removeProductModal" tabindex="-1" role="dialog" aria-labelledby="removeProductModalLabel" aria-hidden="true">
  <!-- Contenido del modal para quitar producto -->
</div>

<!-- Modal para ver lista de productos -->
<div class="modal fade" id="productListModal" tabindex="-1" role="dialog" aria-labelledby="productListModalLabel" aria-hidden="true">
  <!-- Contenido del modal para ver lista de productos -->
</div>


<!-- Modal para quitar producto -->
<div class="modal fade" id="removeProductModal" tabindex="-1" role="dialog" aria-labelledby="removeProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="removeProductModalLabel">Quitar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Selecciona los productos que deseas quitar:</p>
        
        <!-- Aquí puedes agregar la lista de productos con checkboxes -->
        
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="producto1" id="checkboxProducto1">
          <label class="form-check-label" for="checkboxProducto1">
            Producto 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="producto2" id="checkboxProducto2">
          <label class="form-check-label" for="checkboxProducto2">
            Producto 2
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="producto3" id="checkboxProducto3">
          <label class="form-check-label" for="checkboxProducto3">
            Producto 3
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-danger" onclick="quitarProductos()"><i class="fas fa-trash"></i> Quitar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal para ver la lista de productos -->
<div class="modal fade" id="productListModal" tabindex="-1" role="dialog" aria-labelledby="productListModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productListModalLabel">Lista de Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th>Código de Barras</th>
              <th>Nombre Producto</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Precio Total</th>
            </tr>
          </thead>
          <tbody>
            <!-- Aquí puedes iterar sobre los productos y generar las filas de la tabla -->
            <tr>
              <td>1234567890</td>
              <td>Producto 1</td>
              <td>2</td>
              <td>$10.00</td>
              <td>$20.00</td>
            </tr>
            <tr>
              <td>0987654321</td>
              <td>Producto 2</td>
              <td>1</td>
              <td>$15.00</td>
              <td>$15.00</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>





<script>
  function cobrarCompra() {
    // Lógica para cobrar la compra
  }
</script>








<!-- Modal Reportes-->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reportModalLabel">Generar Reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="startDate">Fecha de inicio:</label>
            <input type="date" class="form-control" id="startDate">
          </div>
          <div class="form-group">
            <label for="endDate">Fecha fin:</label>
            <input type="date" class="form-control" id="endDate">
          </div>
          <div class="form-group">
            <label for="reportType">Tipo de reporte:</label>
            <select class="form-control" id="reportType">
              <option value="ventas">Ventas</option>
              <option value="inventario">Inventario</option>
              <option value="clientes">Clientes</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="generarReporte()"><i class="fas fa-file-export"></i> Generar Reporte</button>
      </div>
    </div>
  </div>
</div>

<!-- Alerta para mostrar el resultado -->
<div class="alert alert-success alert-dismissible fade" role="alert" id="reportAlert">
  <strong>¡Éxito!</strong> El reporte se generó correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script>
  function generarReporte() {
    // Obtener los valores de los campos
    var startDate = document.getElementById('startDate').value;
    var endDate = document.getElementById('endDate').value;
    var reportType = document.getElementById('reportType').value;

    // Aquí puedes realizar las operaciones necesarias para generar el reporte

    // Mostrar la alerta
    document.getElementById('reportAlert').classList.add('show');
  }
</script>












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


