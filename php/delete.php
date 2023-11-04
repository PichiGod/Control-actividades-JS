<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
// header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json; charset=utf-8');

include_once('conexion.php');

//id de la actividad
$id = $_GET['id'];

if (!empty($_GET['id'])){
    $query = "DELETE FROM actividades WHERE id = '$id'";
    $rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if($rs == true){
        echo "Se elimino correctamente";
    }else{
        echo "error en el query";
    }
}else {
    echo "ERROR: ID NO EXISTE O NO SE ENCONTRO";
}
    

mysqli_close($conn);
?>