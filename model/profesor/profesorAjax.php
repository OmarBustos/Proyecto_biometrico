<?php 

include ("../../conexion.php");

$idProfesor = $con->real_escape_string($_POST["idProfesor"]);

$query = "SELECT * FROM profesor WHERE idProfesor='$idProfesor'";
$result = $con->query($query);
$rows = $result->num_rows;
$profesor = [];

if ($rows > 0) {
    $profesor = $result->fetch_array();     
}

echo json_encode($profesor, JSON_UNESCAPED_UNICODE); 


?>