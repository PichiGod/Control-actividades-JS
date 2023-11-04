<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json; charset=utf-8');

include_once('conexion.php');

    $description;
    $days;
    $start_date;
    $end_date;
    $responsible;

if (isset($_POST['description']) && isset($_POST['days']) && isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['responsible']) ){
    echo "si existo";    
    
        $description = $_POST['description'];
        $days = $_POST['days'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $responsible = $_POST['responsible'];

        $query = "INSERT INTO actividades(descripcion, finicio, ffin, responsable, cant_dias) VALUES ('$description', '$start_date', '$end_date', '$responsible', '$days');";
        $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if ($rs == true) {
            echo "SUCCESSFUL POST";

        } else {
            echo "ERROR";
        }

} else{
    echo "error";
}

        


mysqli_close($conn);
?>