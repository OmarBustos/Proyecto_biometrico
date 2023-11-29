
<!-- Modal para editar un profesor-->
<div class="modal fade" id="editarProfesor" tabindex="-1" role="dialog" aria-labelledby="editarProfesor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarProfesorLabel">Editar Profesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../model/profesor/profesorEdit.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idProfesor" id="idProfesor">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="movil" class="form-label">Móvil</label>
            <input type="number" name="movil" id="movil" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
          </div>
          <div class="mb-3">
          <label for="dias_clase" class="form-label">Días de Clase</label>
         
          </div> 
          <div class="">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="editarProfesor" id="editarProfesor" class="btn btn-primary">Guardar</button>
          </div>
        </form> 
      </div>      
    </div>
  </div>
</div>