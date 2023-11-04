<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json; charset=utf-8');

include_once('conexion.php');

if (isset($_POST['description']) && isset($_POST['days']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['responsible']) ){
    
    $description = $_POST['description'];
    $days = $_POST['days'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $responsible = $_POST['responsible'];
    $id = $_POST['id'];

    $query = "UPDATE actividades SET descripcion='$description', cant_dias = '$days', finicio='$start_date', ffin='$end_date', responsable='$responsible' WHERE id=$id;";

    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($rs == true){
        echo "Cambio hecho";
    }else{
        echo "Error en la modificacion";
    }
}

mysqli_close($conn);
?>