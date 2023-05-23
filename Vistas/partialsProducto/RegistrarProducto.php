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
                            <label for="id_Producto">ID código producto:</label>
                            <input type="text" class="form-control" id="id_Producto">
                        </div>
                        <div class="form-group">
                            <label for="Nombre_producto">Nombre Producto:</label>
                            <input type="text" class="form-control" id="Nombre_producto">
                        </div>
                        <div class="form-group">
                            <label for="Cantidad_Entradas">Cantidad de Piezas:</label>
                            <input type="text" class="form-control" id="Cantidad_Entradas">
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
                        <label for="exampleDataList" class="form-label">Proveedor</label>
<input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="selecciona un Proveedor">
<datalist id="datalistOptions">
  <option value="Leche San Marco">
  <option value="Quesos Bajios">
  <option value="Bimbo">
  <option value="Grupo FEMSA">
  <option value="Barcel">
</datalist>
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
