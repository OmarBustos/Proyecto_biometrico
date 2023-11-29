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
    <title>Asistencia</title>
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
        <a href="huellas.php" class="enlace">
          <i class="bi bi-calendar-date"></i>
          <span>Asistencias</span>
        </a>
        <a href="../excepcion/excepciones.php" class="enlace">
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
      <h3 class="text-center">Asistencias</h3>
      <table class="table table-md table-striped table-hover mt-4 idTable border">
        <thead class="table-dark">
          <tr>
            <th>fecha</th> 
            <th>Nombre completo</th>
            <th>Asistencia</th>
            <th>Inasistencia</th>
            <th>Inas. Justificada</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $query = "SELECT p.idProfesor, p.nombre, p.apellido, a.fecha, a.idAsistencia FROM profesor p, asistencia a 
            WHERE p.idProfesor=a.idProfesor ORDER BY a.fecha ASC"; 
            $asistencias = mysqli_query($con, $query);
            if(mysqli_num_rows($asistencias) > 0){
              while($asistencia = mysqli_fetch_array($asistencias)){ ?>
              <tr>
                <td><?= $asistencia['fecha']; ?></td>
                <td><?= $asistencia['nombre']." ".$asistencia['apellido']; ?></td>
                <td>
                  <?php 
                  if (!empty($asistencia['idAsistencia'])) {
                    // Si hay huella, mostrar el ícono de verificación
                    echo '<i class="bi bi-check-circle-fill text-success"></i>';
                  }
                  ?>
                </td>
                <td></td>
                <td></td>
              </tr>
            <?php 
              }
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

  <script src="../../assets/js/funciones.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>