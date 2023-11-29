<?php 

include ("../conexion.php");

$idprofesor = $con->real_escape_string($_POST["id_profesor"]);

$query = "SELECT * FROM profesor";
$result = $con->query($query);
$rows = $result->num_rows;
$profesor = [];

if ($rows > 0) {
    $profesor = $result->fetch_array();     
}

echo json_encode($profesor, JSON_UNESCAPED_UNICODE); 


?>