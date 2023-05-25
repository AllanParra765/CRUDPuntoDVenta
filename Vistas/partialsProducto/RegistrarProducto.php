    <!-- Modal Registrar Productos-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inventario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <button type="button" class="btn btn-primary btn-block">
                    <i class="fas fa-barcode"></i> Escanear Producto
                </button>
                <button class="btn btn-info btn-block" type="button">
                    <i class="fas fa-search"></i> Buscar Producto
                </button>
                <br>
                    <form>
                        <div class="form-group">
                            <label for="id_Producto">ID código producto:</label>
                            <input type="text" class="form-control" id="id_Producto">
                        </div>
<hr>
<br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="Nombre_producto" placeholder="Nombre Producto:">
                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" id="Cantidad_Entradas" placeholder="Cantidad de Piezas a Comprar:">
                            <span class="input-group-text">piezas Compradas</span>
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" class="form-control" id="Cantidad_Entradas" placeholder="Cantidad de Piezas Existentes:">
                            <span class="input-group-text">piezas Existentes</span>
                        </div>
                        <br>
                        <div class="input-group">
                        <span class="input-group-text">Compramos a $</span>
                            <input type="number" class="form-control" id="Precio_Compra" placeholder="Precio de Compra:">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text">Vendemos a $</span>
                            <input type="number" class="form-control" id="Precio_Venta" placeholder="Precio de Venta:">
                        </div>
                       <br>
                        <div class="form-group">
                            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Selecciona un Proveedor">
                            <datalist id="datalistOptions">
                              <option value="Leche San Marco">
                              <option value="Quesos Bajios">
                              <option value="Bimbo">
                              <option value="Grupo FEMSA">
                              <option value="Barcel">
                            </datalist>
                            </div>
                        
                        <div class="form-group">
                            <textarea class="form-control" id="Comentarios" rows="3" placeholder="Comentarios:"></textarea>
                        </div>
                        <button type="button" class="btn btn-success btn-block">
            <i class="fas fa-save"></i> Registrar Producto
        </button>
        <button type="button" class="btn btn-secondary btn-block">
            <i class="fas fa-shopping-cart"></i> Comprar Producto
        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
