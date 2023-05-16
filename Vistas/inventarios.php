<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vista de productos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-4NzM6UcRmLjRWsgsXDLhQZceXnXFIKdSWh1q3GNOzYbTweTMYOc6F4o6knzL+Uvma6HLLSxSewS+mZCgjZNK9g==" crossorigin="anonymous" />
 <!-- Incluir la biblioteca Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

 <style>
    .fade-on-focus input[type="text"], 
    .fade-on-focus input[type="number"] {
      transition: opacity 0.2s ease-in-out;
      opacity: 0.5;
    }

    .fade-on-focus input[type="text"]:focus, 
    .fade-on-focus input[type="number"]:focus {
      opacity: 1;
    }

    .button-text-icon .btn {
      display: flex;
      align-items: center;
    }

    .button-text-icon .btn i {
      margin-right: 5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center my-4">Vista de productos</h1>
    <form action="guardar_datos.php" method="POST">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group fade-on-focus">
          <label for="id_producto">Id_Producto</label>
          <input type="text" class="form-control" id="id_producto">
        </div>
        <div class="form-group fade-on-focus">
          <label for="nombre_producto">Nombre_Producto</label>
          <input type="text" class="form-control" id="nombre_producto">
        </div>
        <div class="form-group fade-on-focus">
          <label for="cantidad_entradas">Cantidad_Entradas</label>
          <input type="number" class="form-control" id="cantidad_entradas">
        </div>
        <div class="form-group fade-on-focus">
          <label for="cantidad_existentes">Cantidad_Existentes</label>
          <input type="number" class="form-control" id="cantidad_existentes">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group fade-on-focus">
          <label for="precio_compra">Precio_Compra</label>
          <input type="number" class="form-control" id="precio_compra">
        </div>
        <div class="form-group fade-on-focus">
          <label for="precio_venta">Precio_Venta</label>
          <input type="number" class="form-control" id="precio_venta">
        </div>
        <div class="form-group fade-on-focus">
  <label for="comentarios">Comentarios</label>
  <textarea class="form-control" id="comentarios"></textarea>
</div>

<div class="button-text-icon py-3">
    <button class="btn btn-success">
      <i class="fas fa-plus"></i> Registrar Producto
    </button>
  </div>

<form>
<div class="form-group py-3">
  <div class="button-text-icon">
    <button class="btn btn-primary">
      <i class="fas fa-barcode"></i> Escanear Producto
    </button>
  </div>
 
  <div class="button-text-icon py-3">
    <button class="btn btn-info">
      <i class="fas fa-search"></i> Buscar Producto
    </button>
  </div>
</div>
