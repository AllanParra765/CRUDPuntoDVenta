$.ajax({
    url: "obtener_datos_producto.php",
    data: { codigo_qr: codigo_qr_leido },
    method: "POST",
    dataType: "json",
    success: function(response) {
      // Llenar los campos del formulario con los datos obtenidos
      $("#id_producto").val(response.id_producto);
      $("#nombre_producto").val(response.nombre_producto);
      $("#cantidad_entradas").val(response.cantidad_entradas);
      $("#cantidad_existentes").val(response.cantidad_existentes);
      $("#precio_compra").val(response.precio_compra);
      $("#precio_venta").val(response.precio_venta);
      $("#comentarios").val(response.comentarios);
    },
    error: function(xhr, status, error) {
      alert("Error al obtener los datos del producto");
    }
  });
  