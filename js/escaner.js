// Configurar QuaggaJS
Quagga.init({
    inputStream: {
      name: "Live",
      type: "LiveStream",
      target: document.querySelector('#preview')
    },
    decoder: {
      readers: ['ean_reader', 'ean_8_reader', 'code_128_reader', 'code_39_reader', 'code_39_vin_reader', 'codabar_reader', 'upc_reader', 'upc_e_reader', 'i2of5_reader']
    }
  });
  
  // Manejar la detección de códigos de barras o QR
  Quagga.onDetected(function(result) {
    // Enviar el código de barras o QR a través de una solicitud AJAX
    var codigo = result.codeResult.code;
    $.ajax({
      url: 'obtener_datos_producto.php',
      method: 'POST',
      data: {codigo: codigo},
      success: function(response) {
        // Rellenar los campos de formulario con los datos del producto
        var datos = JSON.parse(response);
        $('#id_producto').val(datos.id_producto);
        $('#nombre_producto').val(datos.nombre_producto);
        $('#cantidad_entradas').val(datos.cantidad_entradas);
        $('#cantidad_existentes').val(datos.cantidad_existentes);
        $('#precio_compra').val(datos.precio_compra);
        $('#precio_venta').val(datos.precio_venta);
        $('#comentarios').val(datos.comentarios);
      }
    });
  });
  
  // Iniciar la vista previa de la cámara
  Quagga.start();
  