<!--Modal para agregar profesores-->
<div class="modal fade" id="nuevoProfesor" tabindex="-1" role="dialog" aria-labelledby="nuevoProfesor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoProfesorLabel">Nuevo Profesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../model/profesor/profesorNew.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="idProfesor" class="form-label">Identificación</label>
            <input type="number" name="idProfesor" id="idProfesor" class="form-control" required>
          </div>
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
            <label for="" class="form-label">Días de Clase</label>
            <div class="row mb-3">
              <div class="col-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="dias_clase[]" id="" value="LUNES">
                  <label class="form-check-label">LUNES</label>
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Hora de inicio</label>
                <input type="time" name="hora_inicio[]" class="form-control" placeholder="Hora de inicio">
              </div>
              <div class="col-4">
                <label class="form-label">Hora final</label>
                <input type="time" name="hora_final[]" class="form-control" placeholder="Hora final">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="dias_clase[]" id="" value="MARTES">
                  <label class="form-check-label">MARTES</label>
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Hora de inicio</label>
                <input type="time" name="hora_inicio[]" class="form-control" placeholder="Hora de inicio">
              </div>
              <div class="col-4">
                <label class="form-label">Hora final</label>
                <input type="time" name="hora_final[]" class="form-control" placeholder="Hora final">
              </div>
            </div> 
            <div class="row mb-3">
              <div class="col-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="dias_clase[]" id="" value="MIERCOLES">
                  <label class="form-check-label">MIERCOLES</label>
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Hora de inicio</label>
                <input type="time" name="hora_inicio[]" class="form-control" placeholder="Hora de inicio">
              </div>
              <div class="col-4">
                <label class="form-label">Hora final</label>
                <input type="time" name="hora_final[]" class="form-control" placeholder="Hora final">
              </div>
            </div> 
            <div class="row mb-3">
              <div class="col-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="dias_clase[]" id="" value="JUEVES">
                  <label class="form-check-label">JUEVES</label>
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Hora de inicio</label>
                <input type="time" name="hora_inicio[]" class="form-control" placeholder="Hora de inicio">
              </div>
              <div class="col-4">
                <label class="form-label">Hora final</label>
                <input type="time" name="hora_final[]" class="form-control" placeholder="Hora final">
              </div>
            </div> 
            <div class="row mb-3">
              <div class="col-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="dias_clase[]" id="" value="VIERNES">
                  <label class="form-check-label">VIERNES</label>
                </div>
              </div>
              <div class="col-4">
                <label class="form-label">Hora de inicio</label>
                <input type="time" name="hora_inicio[]" class="form-control" placeholder="Hora de inicio">
              </div>
              <div class="col-4">
                <label class="form-label">Hora final</label>
                <input type="time" name="hora_final[]" class="form-control" placeholder="Hora final">
              </div>
            </div>  
          </div>
          <div class="">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="agregarProfesor" id="agregarProfesor" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>     
  </div>
</div>
