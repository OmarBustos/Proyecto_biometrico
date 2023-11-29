<?php 

session_start();
include ("../../conexion.php");

if (isset($_POST["btnIngresar"])) {
    $user = mysqli_real_escape_string($con, $_POST["user"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $sql = $con->query("SELECT * FROM administrador WHERE usuario='$user' AND contrasena='$password' LIMIT 1");    

    if ($admin = $sql->fetch_object()) {
        $_SESSION["idAdmin"] = $admin->idAdmin;
        $_SESSION["nombreAdmin"] = $admin->nombreAdmin;
        $_SESSION["apellidoAdmin"] = $admin->apellidoAdmin;
        $_SESSION["usuario"] = $admin->usuario;
        header("Location: ../../index.php");
        exit(0);
    }else{
        echo '<div class="alert alert-danger">Usuario o contraseña incorrecta</div>';
        header("Location: ../../view/admin/login.php");
        exit(0);
    }
}

?>