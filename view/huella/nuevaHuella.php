<!--Modal para agregar huellas-->
<div class="modal fade" id="nuevaHuella" tabindex="-1" role="dialog" aria-labelledby="nuevaHuella" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevaHuellaLabel">Agregar huella</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../model/profesor/profesorNew.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idProfesor" id="idProfesor">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
          </div>
          <div class="mb-3 text-center">
            <h6 class="text-center">Por favor coloque la huella en el sensor!</h6>
          </div>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="agregarHuella" id="agregarHuella" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>     
  </div>
</div>