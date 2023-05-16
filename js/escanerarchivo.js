// Obtener referencia al botón de escaneo
const scanButton = document.getElementById('scan-button');

// Obtener referencia al elemento donde se mostrará la vista previa de la cámara
const cameraPreview = document.getElementById('camera-preview');

// Añadir un evento al botón de escaneo
scanButton.addEventListener('click', function() {

	// Configurar QuaggaJS para utilizar la cámara
	Quagga.init({
		inputStream : {
			name : "Live",
			type : "LiveStream",
			target: cameraPreview, // El elemento donde se mostrará la vista previa de la cámara
			constraints: {
				width: 640,
				height: 480,
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
			Quagga.stop();

			// Obtener el código de barras escaneado
			const barcode = result.codeResult.code;

			// Hacer algo con el código de barras escaneado (por ejemplo, cargar la información del producto en los campos del formulario)
			alert(barcode);
		});
	});

});
