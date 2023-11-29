
<!-- Modal para eliminar un profesor-->
<div class="modal fade" id="eliminarProfesor" tabindex="-1" role="dialog" aria-labelledby="eliminarProfesor" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarProfesorLabel"><i class="bi bi-info-circle-fill"></i> Aviso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Deseas eliminar el registro?       
      </div>
      <div class="modal-footer">
        <form action="../../model/profesor.php" method="post">          
          <input type="hidden" name="idProfesor" id="idProfesor">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" name="eliminarProfesor" id="eliminarProfesor" class="btn btn-danger">Eliminar</button>
        </form>
      </div> 
    </div>     
  </div>
</div> 