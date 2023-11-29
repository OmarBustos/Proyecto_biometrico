<?php 

require ("../../conexion.php");

// Editar profesores
if (isset($_POST["editarProfesor"])) {
    $idProfesor = mysqli_real_escape_string($con, $_POST["idProfesor"]);
    $nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
    $apellidos = mysqli_real_escape_string($con, $_POST["apellidos"]);
    $movil = mysqli_real_escape_string($con, $_POST["movil"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);

    $query = "UPDATE profesor SET nombre='$nombre', apellido='$apellidos', movil='$movil', email='$email' WHERE idProfesor='$idProfesor'";
    $queryRun = mysqli_query($con, $query);

    if($queryRun){
        echo "<h3>Datos actualizados correctamente</h3>";
        header("Location: ../../view/profesor/profesores.php");
        exit(0);
    }else{
        echo "<h3>Error al actualizar los datos: " . mysqli_error($con) . "</h3>";
        // header("Location: ../../view/profesor/profesores.php");
        exit(0);
    }
}

?>