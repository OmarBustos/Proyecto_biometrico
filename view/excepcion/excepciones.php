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
    <title>Excepciones</title>
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

    <!-- Contenido principal -->
    <div class="container py-3">
    <h3 class="text-center">Excepciones</h3>
      <div class="row  justify-content-end">
        <div class="col-auto">
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevaExcepcionProfesor">
          <i class="bi bi-plus-square-fill"></i> Nuevo Excepción
          </a>
        </div>
      </div>
    </div>

  </div>

  <!--botón de ir hacia arriba-->
  <div id="btn-arriba">
    <i class="bi bi-arrow-up"></i>
  </div>

  <?php include 'nuevaExcepcionProfesor.php'; ?>

  <script src="../../assets/js/funciones.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>