<?php 

session_start();
require ("../../conexion.php");
if (empty($_SESSION["idAdmin"])) {
  header("Location: ../admin/login.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <title>Profesores</title>
</head>
<body>

  <!--navbar-->
  <header class="header">
    <div class="logo">
      <a href="#" class="icon">
        <i class="bi bi-list" id="menu-btn"></i>
      </a>
      <a href="#" class="name-logo">I.E. LAS LLANADAS</a>
    </div>
    <nav class="nav-bar">
      <a href="#"><?= $_SESSION["nombreAdmin"]." ".$_SESSION["apellidoAdmin"]; ?></a>
      <a href="#" class="icon">
        <i class="bi bi-person-circle" id="user-btn"></i>
      </a>
    </nav>
    <div class="user-options">
      <div class="option">
        <a href="#"><i class="bi-person-circle"></i> Perfil</a>
      </div>
      <div class="option">
        <a href="model/admin/cerrarSesion.php" class="text-danger"><i class="bi bi-arrow-right-circle"></i> Cerrar sesión</a>
      </div>
    </div>
  </header>

  <!--main-->
  <div class="principal d-flex">
    <!--menu lateral-->
    <div class="menu-dashboard">
      <div class="top-menu">
        <div class="logo">
          <img src="../../img/iconos/book.svg" alt="">
          <span>Las Llanadas</span>
          <i class="bi bi-x text-white"></i>
        </div>
      </div>
      <div class="menu mt-2">
        <a href="../../index.php" class="enlace">
          <i class="bi bi-house"></i>
          <span>Inicio</span>
        </a>
        <a href="profesores.php" class="enlace">
          <i class="bi bi-person"></i>
          <span>Profesores</span>
        </a>
        <a href="../huella/huellas.php" class="enlace">
          <i class="bi bi-fingerprint"></i>
          <span>Huellas</span>
        </a>
        <a href="../asistencia/asistencia.php" class="enlace">
          <i class="bi bi-calendar-date"></i>
          <span>Asistencias</span>
        </a>
        <a href="#" class="enlace">
          <i class="bi bi-exclamation-diamond-fill"></i>
          <span>Excepciones</span>
        </a>
        <a href="#" class="enlace">
          <i class="bi bi-filetype-pdf"></i>
          <span>Reportes</span>
        </a>
      </div>
    </div>

    <!-- Contenido principal -->
    <div class="container py-3">
      <h3 class="text-center">Profesores</h3>
      <div class="row  justify-content-end">
        <div class="col-auto">
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoProfesor">
          <i class="bi bi-plus-square-fill"></i> Nuevo profesor
          </a>
        </div>
      </div>
      <form class="d-flex mt-2">
        <input class="form-control me-2 light-table-filter ms-8" data-table="idTable" type="text" 
        placeholder="Buscar">
        <hr>
      </form>
      <table class="table table-md table-striped table-hover mt-4 idTable">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Móvil</th>
            <th>Email</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $query = "SELECT * FROM profesor";
          $profesores = mysqli_query($con, $query);
          if (mysqli_num_rows($profesores) > 0) { 
            while($profesor = mysqli_fetch_array($profesores)) { ?>
          <tr>
            <td><?php echo $profesor['idProfesor']; ?></td>
            <td><?php echo $profesor['nombre']; ?></td>
            <td><?php echo $profesor['apellido']; ?></td>
            <td><?php echo $profesor['movil']; ?></td>
            <td><?php echo $profesor['email']; ?></td>
            <td>
              <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarProfesor" data-bs-idprofesor="<?= $profesor['idProfesor']; ?>">
                <i class="bi bi-pencil"></i> Editar
              </a>
            </td>
          </tr>
          <?php 
            }
          }else{
            echo '<span> No hay datos en la tabla </span>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!--botón de ir hacia arriba-->
  <div id="btn-arriba">
    <i class="bi bi-arrow-up"></i>
  </div>

  <?php include 'nuevoProfesor.php'; ?>
  <?php include 'editarProfesor.php'; ?>
  
  <script src="../../assets/js/funciones.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
  

  <script>
    //boton para editar profesor
    let editarProfesor =document.getElementById('editarProfesor');
    editarProfesor.addEventListener('show.bs.modal', event => {
      let button = event.relatedTarget;
      let idProfesor = button.getAttribute('data-bs-idprofesor');

      let inputIdProfesor =editarProfesor.querySelector('.modal-body #idProfesor');
      let inputNombre =editarProfesor.querySelector('.modal-body #nombre');
      let inputApellidos =editarProfesor.querySelector('.modal-body #apellidos');
      let inputMovil =editarProfesor.querySelector('.modal-body #movil');
      let inputEmail =editarProfesor.querySelector('.modal-body #email');
      let inputDia =editarProfesor.querySelector('.modal-body #dias_clase');

      /*Peticion AJAX para editar registro*/
      let url = "../../model/profesor/profesorAjax.php";
      //Se crea un objeto FormData que se utiliza para construir pares 
      let formData = new FormData();
      formData.append('idProfesor', idProfesor)

      fetch(url, {
        method: 'POST',
        //los datos se envían en el cuerpo de la solicitud.
        body: formData
      }).then(response => response.json())
      .then(data => {
        inputIdProfesor.value = data.idProfesor;
        inputNombre.value = data.nombre;
        inputApellidos.value = data.apellido;
        inputMovil.value =data.movil;
        inputEmail.value =data.email;
        
        //inputDia.value = data.id_dia;
      })//catch(err => console.log(err))

    });

  </script>

</body>
</html>