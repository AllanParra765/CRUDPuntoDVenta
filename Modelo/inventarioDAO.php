<?php
// Conexión a la base de datos
include "db_connection.php";
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtener los datos del formulario
  $id_producto = $_POST['id_producto'];
  $nombre_producto = $_POST['nombre_producto'];
  $cantidad_entradas = $_POST['cantidad_entradas'];
  $cantidad_existentes = $_POST['cantidad_existentes'];
  $precio_compra = $_POST['precio_compra'];
  $precio_venta = $_POST['precio_venta'];
  $comentarios = $_POST['comentarios'];
  // Preparar la sentencia INSERT INTO
  $sql = "INSERT INTO productos (id_producto, nombre_producto, cantidad_entradas, cantidad_existentes, precio_compra, precio_venta, comentarios) VALUES ('$id_producto', '$nombre_producto', '$cantidad_entradas', '$cantidad_existentes', '$precio_compra', '$precio_venta', '$comentarios')";
  // Ejecutar la sentencia
  mysqli_query($conn, $sql);
  // Verificar si se ha insertado correctamente
  if (mysqli_affected_rows($conn) > 0) {
    echo "Los datos se han guardado correctamente";
  } else {
    echo "Error al guardar los datos";
  }
}
?>
