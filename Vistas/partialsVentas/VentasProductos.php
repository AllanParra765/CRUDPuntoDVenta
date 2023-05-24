


<!-- Modal de Escaneo de Código de Barras -->
<div class="modal fade" id="scanModal" tabindex="-1" role="dialog" aria-labelledby="scanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scanModalLabel">Escanear Código de Barras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <button id="scan-button" type="button" class="btn btn-primary" ><i class="fas fa-barcode"></i> Escanear</button>
     
       

       <input type="text" class="form-control mt-3" id="codigoBarras" placeholder="Código de Barras" oninput="agregarProducto()" readonly>





      <br>
      <button type="button" class="btn btn-success" onclick="agregarProducto()"><i class="fas fa-plus"></i> Agregar a la Lista</button>
      <br>
      <br>
      <h5 class="modal-title" id="listaModalLabel">Lista de Productos</h5>
       
        <hr>
        <ul id="productosLista" class="list-group"></ul>
        <hr>
        <h4>Total a Cobrar: <span id="totalCobrar">$0.00</span></h4>
      </div>
      <div id="camera-preview" class=" ml-md-5 pl-md-4"></div>
      <div class="modal-footer">
        <button id="scan-cobrar" type="button" class="btn btn-success" onclick="cobrar()"><i class="fas fa-money-bill"></i> Cobrar</button>
        <button id="scan-cancelar" type="button" class="btn btn-danger" onclick="cancelarCompra()"><i class="fas fa-times-circle"></i> Cancelar Compra</button>
      </div>
    </div>
  </div>
</div>



<script>
  var productos = []; // Array para almacenar los productos agregados

  // Función para escanear el código de barras
  //function scanearCodigoBarras() {

    
    // Aquí puedes agregar la lógica para escanear el código de barras

    // Ejemplo: Generar un código de barras aleatorio
   // var codigoBarras = Math.floor(Math.random() * 1000000000000).toString();

    //document.getElementById('codigoBarras').value = codigoBarras;
   // document.getElementById('codigoBarras').value = codigoBarras;
  //}

  // Función para agregar un producto a la lista
  function agregarProducto() {
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

  // Función para actualizar la lista de productos en el modal
  function actualizarListaProductos() {
  var listaProductos = document.getElementById('productosLista');
  listaProductos.innerHTML = '';

  productos.forEach(function (producto) {
    var listItem = document.createElement('li');
    listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
    listItem.innerHTML = producto.nombre + ' - $' + producto.precio.toFixed(2);

    var removeButton = document.createElement('button');
    removeButton.className = 'btn btn-danger btn-sm mr-2';
    removeButton.innerHTML = '<i class="fas fa-times"></i>';
    removeButton.addEventListener('click', function () {
      eliminarProducto(producto.codigoBarras);
    });

    var duplicateButton = document.createElement('button');
    duplicateButton.className = 'btn btn-primary btn-sm';
    duplicateButton.innerHTML = '<i class="fas fa-clone"></i>';
    duplicateButton.addEventListener('click', function () {
      duplicarProducto(producto.codigoBarras);
    });

    listItem.appendChild(removeButton);
    listItem.appendChild(duplicateButton);
    listaProductos.appendChild(listItem);
  });

  actualizarTotalCobrar();
}


  // Función para eliminar un producto de la lista
  function eliminarProducto(codigoBarras) {
    productos = productos.filter(function (producto) {
      return producto.codigoBarras !== codigoBarras;
    });

    actualizarListaProductos();
  }

  // Función para actualizar el total a cobrar en el modal
  function actualizarTotalCobrar() {
    var totalCobrar = productos.reduce(function (total, producto) {
      return total + producto.precio;
    }, 0);

    document.getElementById('totalCobrar').textContent = '$' + totalCobrar.toFixed(2);
  }

  // Función para limpiar el campo de código de barras
  function limpiarCampoCodigoBarras() {
    document.getElementById('codigoBarras').value = '';
  }

  // Función para cancelar la compra y limpiar la lista de productos
  function cancelarCompra() {
    productos = [];
    actualizarListaProductos();

    $('#listaModal').modal('hide'); // Cerrar el modal de lista de productos
  }

  // Función para cobrar y mostrar el ticket
  function cobrar() {
    var totalCobrar = document.getElementById('totalCobrar').textContent;

    // Aquí puedes realizar las operaciones necesarias para el cobro y generación del ticket

    // Ejemplo: Mostrar una alerta con el total a cobrar antes de imprimir el ticket
    alert('Total a cobrar: ' + totalCobrar);

    cancelarCompra(); // Limpiar la lista de productos

    // Aquí puedes redirigir a la página de impresión del ticket
  }
</script>

