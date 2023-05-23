
<!-- Modal Reportes-->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reportModalLabel">Generar Reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="startDate">Fecha de inicio:</label>
            <input type="date" class="form-control" id="startDate">
          </div>
          <div class="form-group">
            <label for="endDate">Fecha fin:</label>
            <input type="date" class="form-control" id="endDate">
          </div>
          <div class="form-group">
            <label for="reportType">Tipo de reporte:</label>
            <select class="form-control" id="reportType">
              <option value="ventas">Ventas</option>
              <option value="inventario">Inventario</option>
              <option value="clientes">Clientes</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="generarReporte()"><i class="fas fa-file-export"></i> Generar Reporte</button>
      </div>
    </div>
  </div>
</div>

<!-- Alerta para mostrar el resultado -->
<div class="alert alert-success alert-dismissible fade" role="alert" id="reportAlert">
  <strong>¡Éxito!</strong> El reporte se generó correctamente.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script>
  function generarReporte() {
    // Obtener los valores de los campos
    var startDate = document.getElementById('startDate').value;
    var endDate = document.getElementById('endDate').value;
    var reportType = document.getElementById('reportType').value;

    // Aquí puedes realizar las operaciones necesarias para generar el reporte

    // Mostrar la alerta
    document.getElementById('reportAlert').classList.add('show');
  }
</script>


