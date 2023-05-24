<?php
include "partials/headerEmpleado.php";
?>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Empleados</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fa fa-home"></i> Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal"  data-target="#scanModal"><i class="fa fa-shopping-cart"></i> Ventas</a>
    </li>
    <li class="nav-item">
     
      <a class="nav-link" data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-archive" data-toggle="modal"></i> Inventario</a>
    </li>
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-chart-bar"></i> Reportes
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Reporte 1</a>
        <a class="dropdown-item" href="#">Reporte 2</a>
        <a class="dropdown-item" href="#">Reporte 3</a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../Controlador/logout.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
    </li>
  </ul>
</div>
</nav>



<?php

  include "partialsProducto/RegistrarProducto.php";
  // Modal Venta de Productos
  include "partialsVentas/VentasProductos.php"; 
  // Modal de Registro de Usuario 
  //include "partialsUsuario/RegistrarUsuario.php";
  //Modal Reportes
  //include "partialsReporte/GenerarReporte.php";
  //Footer de la pagina
  include "partials/footerEmpleado.php";
  ?>




http://localhost:8888/CRUDPUNTODVENTA/Vistas/empleado.php#
