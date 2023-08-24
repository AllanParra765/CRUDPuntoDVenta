// Obtener referencia al botón de escaneo
const scanButton = document.getElementById('scan-button');

// Obtener referencia al elemento donde se mostrará la vista previa de la cámara
const cameraPreview = document.getElementById('camera-preview');
//Obtener Referencia para cerrar escanner
const CloseCancelarButton = document.getElementById('scan-cancelar');
const CloseCobrarButton = document.getElementById('scan-cobrar');

// Añadir un evento al botón de escaneo
scanButton.addEventListener('click', function() {

	// Configurar QuaggaJS para utilizar la cámara
	Quagga.init({
		inputStream : {
			name : "Live",
			type : "LiveStream",
			target: cameraPreview, // El elemento donde se mostrará la vista previa de la cámara
			constraints: {
				width: 340,
				height: 280,
				facingMode: "environment" // Usar la cámara trasera (si está disponible)
			}
		},
		decoder: {
			readers : ["ean_reader", "ean_8_reader", "code_128_reader", "code_39_reader", "code_39_vin_reader", "codabar_reader", "upc_reader", "upc_e_reader", "i2of5_reader"] // Especificar el tipo de código de barras a escanear
		}
	}, function(err) {
		if (err) {
			console.log(err);
			return;
		}

		// Iniciar la cámara y el escaneo
		Quagga.start();

		// Añadir un evento para detectar cuando se ha escaneado el código de barras
		Quagga.onDetected(function(result) {

			// Detener el escaneo de QuaggaJS
			//Quagga.stop();

			// Obtener el código de barras escaneado
			const barcode = result.codeResult.code;

			// Hacer algo con el código de barras escaneado (por ejemplo, cargar la información del producto en los campos del formulario)
			document.getElementById('codigoBarras').value = barcode;
			var audio = new Audio("img/barcode.wav");
  			audio.play();
			//alert(barcode);
		});
	});

});

document.getElementById("codigoBarras").oninput = function() {agregarProducto2()};

//agrego función al momento de cobrar o cancelar compra para apagar el escanner //Quagga.stop();
CloseCancelarButton.addEventListener('click', function() {
	Quagga.stop();
	
});
CloseCobrarButton.addEventListener('click', function() {
	Quagga.stop();
	
});


function agregarProducto2() {
    var codigoBarras = document.getElementById('codigoBarras').value;

    // Aquí puedes buscar la información del producto en base al código de barras

    // Ejemplo: Generar un nombre y precio aleatorios para el producto
    var nombreProducto = "Producto " + codigoBarras;
    var precioProducto = Math.random() * 100;

    var producto = {
      codigoBarras: codigoBarras,
      nombre: nombreProducto,
      precio: precioProducto
    };

    productos.push(producto);
    actualizarListaProductos();
    limpiarCampoCodigoBarras();

   // $('#scanModal').modal('hide'); // Cerrar el modal de escaneo
  }


  function duplicarProducto(codigoBarras) {
	// Buscar el producto en la lista por su código de barras
	var productoExistente = productos.find(function(producto) {
	  return producto.codigoBarras === codigoBarras;
	});
  
	// Verificar si se encontró el producto
	if (productoExistente) {
	  // Crear un nuevo objeto para duplicar el producto
	  var nuevoProducto = {
		codigoBarras: productoExistente.codigoBarras,
		nombre: productoExistente.nombre,
		precio: productoExistente.precio
	  };
  
	  // Agregar el nuevo producto a la lista
	  productos.push(nuevoProducto);
  
	  // Actualizar la lista de productos
	  actualizarListaProductos();
	}
  }
  

