<?php
session_start();
include("../conexion.php");

//Agregar profesores
if (isset($_POST['agregarProfesor'])) {
    $idProfesor = $_POST['idProfesor'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $movil = $_POST['movil'];
    $diasClase = $_POST['dias_clase'];
    $horaInicio = $_POST['hora_inicio'];
    $horaFinal = $_POST['hora_final'];

    // Insertamos el profesor en la tabla profesor
    $sql = "INSERT INTO profesor (id_profesor, nombre, apellido, movil) VALUES ('$idProfesor', '$nombre', '$apellidos', '$movil')";

    if (mysqli_query($con, $sql)) {
        // La inserción en la tabla 'profesor' se realizó con éxito
        // Recorremos los días de clase seleccionados
        for ($i = 0; $i < count($diasClase); $i++) {
            $dia = $diasClase[$i];
            $inicio = $horaInicio[$i];
            $final = $horaFinal[$i];

            //if (!empty($horaInicio[$i]) && !empty($horaFinal[$i])) {
                //$inicio = $horaInicio[$i];
                //$final = $horaFinal[$i];

            $sqlHorario = "INSERT INTO horario (id_profesor, dia, hora_inicio, hora_final) VALUES 
            ('$idProfesor', '$dia', '$inicio', '$final')";
            mysqli_query($con, $sqlHorario);
        }
    }
        $_SESSION['message'] = "Profesor agregado correctamente";
        header("Location: ../view/profesor/profesores.php");
        exit(0);

    } else {
        $_SESSION['message'] = "Error al agregar el profesor";
        header("Location: ../view/profesor/profesores.php");
        exit(0);
    }



//Eliminar profesores
if (isset($_POST["eliminarProfesor"])) {
    $idProfesor = $_POST["idProfesor"];

    $query = "DELETE FROM profesor WHERE id_profesor='$idProfesor'";
    $queryRun = mysqli_query($con, $query);

    if($queryRun) {
        echo "<h3>Datos eliminados correctamente</h3>";
        header("Location: ../view/profesor/profesores.php");
        exit(0);
    }else{
        echo "<h3>Error al eliminar el registro</h3>";
        header("Location: ../view/profesor/profesores.php");
        exit(0);
    }
}
    
?>
