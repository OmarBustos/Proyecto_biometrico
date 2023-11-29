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
  <title>Huellas</title>
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
        <a href="../../model/admin/cerrarSesion.php" class="text-danger"><i class="bi bi-arrow-right-circle"></i> Cerrar sesión</a>
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
        <a href="../profesor/profesores.php" class="enlace">
          <i class="bi bi-person"></i>
          <span>Profesores</span>
        </a>
        <a href="huellas.php" class="enlace">
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
        <h3 class="text-center">Registro de huellas</h3>
        <table class="table table-sm table-striped table-hover mt-4">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Nombre Completo</th>
              <th>Huella</th>
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
              <td><?php echo $profesor['nombre']." ". $profesor['apellido']; ?></td>
              <td>
              <?php 
                    if (!empty($profesor['huella'])) {
                        // Si hay huella, mostrar el ícono de verificación
                        echo '<i class="bi bi-check-circle-fill text-success"></i>';
                    } else {
                        // Si no hay huella, mostrar el ícono de "X"
                        echo '<i class="bi bi-x-circle-fill text-danger"></i>';
                    }
                ?>
              </td>
              <td>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verHuella" data-bs-idprofesor="<?= $profesor['idProfesor']; ?>">
                  <i class="bi bi-eye"></i> 
                </a>
                <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#nuevaHuella" data-bs-idprofesor="<?= $profesor['idProfesor']; ?>" onclick="enviarIDProfesor(<?= $profesor['idProfesor']; ?>)">
                  <i class="bi bi-fingerprint"></i> 
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

  <?php include 'nuevaHuella.php'; ?>
  <script src="../../assets/js/funciones.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>

  <script>
    // Función para enviar el ID de la huella al servidor en la Raspberry Pi
    function enviarIDProfesor(idProfesor) {
      const url = 'http://192.168.1.20//home/asus/Desktop/bd.py'; // Reemplaza con la dirección de tu Raspberry Pi

      // Objeto de datos que enviarás al servidor
      const data = new URLSearchParams();
      data.append('idProfesor', idProfesor);

      fetch(url, {
          method: 'POST',
          body: data,
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
      })
      .then(response => {
          if (!response.ok) {
              throw new Error('Hubo un problema al enviar los datos.');
          }
          // Manejar la respuesta si es necesaria
          return response.json(); // Si se espera una respuesta JSON
      })
      .then(data => {
          // Manejar la respuesta del servidor si es necesaria
          console.log('Respuesta del servidor:', data);
      })
      .catch(error => {
          console.error('Error:', error);
      });
    }

  </script>

</body>
</html>