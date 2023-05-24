<?php
include "partials/headerAdmin.php";
?>
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
					<a class="nav-link" data-toggle="modal" data-target="#myModal" href="#"><i class="fas fa-plus" data-toggle="modal"></i> Inventario</a>
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
  <?php
  include "partialsProducto/RegistrarProducto.php";
  // Modal de Registro de Usuario 
  include "partialsUsuario/RegistrarUsuario.php";
  //Modal Reportes
  include "partialsReporte/GenerarReporte.php";
  //Footer de la pagina
  include "partials/footerAdmin.php";
  ?>


