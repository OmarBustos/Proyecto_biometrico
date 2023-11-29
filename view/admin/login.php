<?php 

require ("../../conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../../assets/css/login.css">
  <title>Login</title>
</head>
<body>


	<div class="container">
		<div class="img">
			<img src="../../img/school.png">
		</div>
  <div class="login-content">
    <form action="../../model/admin/login.php" method="post">
      <img src="../../img/avatar.svg">
      <h2 class="title">bienvenido</h2>
        <div class="input-div one">
            <div class="i">
              <i class="bi bi-person-circle"></i>
            </div>
            <div class="div">
              <h5>Usuario</h5>
              <input type="text" class="input" name="user" id="user" required>
            </div>
        </div>
        <div class="input-div pass">
            <div class="i"> 
              <i class="bi bi-lock"></i>
            </div>
            <div class="div">
              <h5>Contraseña</h5>
              <input type="password" class="input" name="password" id="password" required>
            </div>
        </div>
        <a href="#">¿Olvidaste la contraseña?</a>
        <input type="submit" class="btn" value="Ingresar" name="btnIngresar">
      </form>
    </div>
  </div>

  <script src="../../assets/js/login.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>