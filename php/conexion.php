<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "control_act";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die(mysqli_error($conn));
}else{
    //echo "Conectado", "<br>";
}

?>