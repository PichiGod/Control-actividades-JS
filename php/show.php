<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json; charset=utf-8');

include_once('conexion.php');

$results = array();
$json_array = [];
$PSI_results = [];

$query = "SELECT * FROM actividades";


$rs    = mysqli_query($conn, $query) or die(mysqli_error($conn));

$activities = mysqli_fetch_all($rs, MYSQLI_ASSOC);

echo json_encode($activities);
mysqli_close($conn);
?>