<?php
session_start();
include("../../conexion.php");

//Agregar profesores
if (isset($_POST['agregarProfesor'])) {
    $idProfesor = $_POST['idProfesor'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $movil = $_POST['movil'];
    $email = $_POST['email'];
    $diasClase = $_POST['dias_clase'];
    $horaInicio = $_POST['hora_inicio'];
    $horaFinal = $_POST['hora_final'];

    // Insertamos el profesor en la tabla profesor
    $sql = "INSERT INTO profesor (idProfesor, nombre, apellido, movil, email) VALUES ('$idProfesor', '$nombre', '$apellidos', '$movil', '$email')";

    if (mysqli_query($con, $sql)) {
        // Recorremos los días de clase seleccionados
        for ($i = 0; $i < count($diasClase); $i++) {
            $dia = $diasClase[$i];
            //$inicio = $horaInicio[$i];
            //$final = $horaFinal[$i];

            $sqlHorario = "INSERT INTO horario (idProfesor, dia) VALUES ('$idProfesor', '$dia')";
            mysqli_query($con, $sqlHorario);
        }
    }

  // Mostrar SweetAlert si los datos se guardaron correctamente
    echo '<script>
    Swal.fire({
      icon: "success",
      title: "¡Datos guardados correctamente!",
      showConfirmButton: false,
      timer: 2000
    }).then(function() {
      window.location = "../../view/profesor/profesores.php";
    });
  </script>';
} else {
// Mostrar SweetAlert si hubo un error al guardar los datos
echo '<script>
     Swal.fire({ 
          icon: "error",
          title: "¡Error al guardar los datos!",
          text: "Hubo un problema al guardar los datos en la tabla de profesores.",
          showConfirmButton: false,
          timer: 3000
        }).then(function() {
          window.location = "../../view/profesor/profesores.php";
        });
      </script>';
}



?>
