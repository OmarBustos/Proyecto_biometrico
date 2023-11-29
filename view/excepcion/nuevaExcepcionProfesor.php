<!--Modal para agregar profesores-->
<div class="modal fade" id="nuevaExcepcionProfesor" tabindex="-1" role="dialog" aria-labelledby="nuevaExcepcionProfesor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevaExcepcionProfesorLabel">Excepciones Profesores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../model/profesor/profesorNew.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="idProfesor" class="form-label">Profesor</label>
            <select class="form-select" aria-label="Default select example" name="idProfesor" id="idProfesor">
              <option selected>seleccione el profesor</option>
              <?php 
              $query = "SELECT * FROM profesor";
              $queryRun = mysqli_query($con, $query);
              if(mysqli_num_rows($queryRun) > 0){
                while($profesor = mysqli_fetch_array($queryRun)){
              ?>
              <option name="idProfesor" id="idProfesor" value="<?php echo $profesor['idProfesor']; ?>"><?php echo $profesor['nombre']." ".$profesor['apellido']; ?></option>
              <?php 
                }
              }else{
                echo "<span>No hay datos en la tabla</span>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Tipo excepcion</label>
            <select class="form-select" aria-label="Default select example">
              <option selected>seleccione el tipo de excepcion</option>
              <?php 
              $sql = "SELECT * FROM tipo";
              $tipos = mysqli_query($con, $sql);
              if(mysqli_num_rows($tipos) > 0){
                while($tipo = mysqli_fetch_array($tipos)){
              ?>
              <option value="<?php echo $tipo['idTipo']; ?>"><?php echo $tipo['nombre']; ?></option>
              <?php 
                }
              }else{
                echo "<span>No hay datos en la tabla</span>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="fechaInicial" class="form-label">Fecha de Inicio</label>
            <input class="form-control" type="date" name="fechaInicial" id="fechaInicial">
          </div>
          <div class="mb-3">
            <label for="fechaFinal" class="form-label">Fecha de Finalizacion</label>
            <input class="form-control" type="date" name="fechaFinal" id="fechaFinal">
          </div>
        </form>
        <div class="">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x text-white"></i></button>
          <button type="submit" name="agregarProfesor" id="agregarProfesor" class="btn btn-primary">Guardar</button>
        </div>  
      </div>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>     
  </div>
</div>