<?php 

session_start();
require ("conexion.php");
if (empty($_SESSION["idAdmin"])) {
  header("Location: view/admin/login.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <title>Inicio</title>
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

  <!--botón de ir hacia arriba-->
  <div id="btn-arriba">
    <i class="bi bi-arrow-up"></i>
  </div>

  <!--main-->
  <div class="principal d-flex">
    <!--menu lateral-->
    <div class="menu-dashboard">
      <div class="top-menu">
        <div class="logo">
          <img src="img/iconos/book.svg" alt="">
          <span>Las Llanadas</span>
          <i class="bi bi-x text-white"></i>
        </div>
      </div>
      <div class="menu mt-2">
        <a href="#" class="enlace">
          <i class="bi bi-house"></i>
          <span>Inicio</span>
        </a>
        <a href="view/profesor/profesores.php" class="enlace">
          <i class="bi bi-person"></i>
          <span>Profesores</span>
        </a>
        <a href="view/huella/huellas.php" class="enlace">
          <i class="bi bi-fingerprint"></i>
          <span>Huellas</span>
        </a>
        <a href="#" class="enlace">
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

      <div class="container py-3">
        <h3 class="text-center">Horario general</h3>
        <table class="table table-md table-striped table-hover mt-4">
          <thead class="table-dark">
            <tr>
              <th>Profesor</th>
              <th>LUNES</th>
              <th>MARTES</th>
              <th>MIERCOLES</th>
              <th>JUEVES</th>
              <th>VIERNES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $daysOfWeek = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES'];
            $horarios = "SELECT p.nombre, p.apellido, GROUP_CONCAT(h.dia) AS dias_clase FROM profesor p, horario h 
            WHERE p.idProfesor=h.idProfesor GROUP BY p.idProfesor;";
            $horariosRun = mysqli_query($con, $horarios);
            if (mysqli_num_rows($horariosRun) > 0) {
              while ($horario = mysqli_fetch_assoc($horariosRun)) {
            ?>
            <tr>
              <td><?= $horario['nombre']." ".$horario['apellido']; ?></td>
              <?php
              foreach ($daysOfWeek as $day) {
                  if (strpos($horario['dias_clase'], $day) !== false) {
                      // Si el día está presente en la lista de días de clase del profesor
                      echo '<td><i class="bi bi-check-circle-fill text-success"></i></td>';
                  } else {
                      // Si el día no está presente en la lista de días de clase del profesor
                      echo '<td></td>';
                  }
              }
              ?>
            </tr>
            <?php

              }
            } else {
              echo "<span>No hay datos en la tabla</span>";
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>
  
  <script src="assets/js/funciones.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>