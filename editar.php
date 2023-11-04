<?php

include_once('php/conexion.php');

//ID DE LA TABLA actividad
$id = $_GET['id'];

$query = "SELECT * FROM actividades WHERE id = '$id';";
$rs = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($rs == true) {
    $row = mysqli_fetch_row($rs);
    //echo $row;
} else {
    $row = 'Error en la matrix';
    echo $row;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar registro</title>

</head>

<body>

    <h1 class='mt-3 ms-3'>Modificar registro</h1>

    <div class='container'>
        <form id="activity-edit">
            <div class="my-3">
                <label for="description" >Descripción:</label>
                <input type="text" name="description" id="description" value="<?php echo $row[1] ?>" >
            </div>
            <div class="mb-3">
                <label for="finicio" >Fecha de Inicio:</label>
                <input type="date" name="finicio"  id="finicio" value="<?php echo $row[2] ?>">
            </div>
            <div class="mb-3">
                <label for="ffinal" >Fecha de Fin:</label>
                <input type="date" name="ffinal" id="ffinal" value="<?php echo $row[3] ?>">
            </div>
            <div class="mb-3">
                <label for="cantdias" >Cantidad de días:</label>
                <input type="number" name="cantDias" id="cantDias" value="<?php echo $row[5] ?>">
            </div>
            <div class="mb-3">
                <label for="responsible" >Responsable:</label>
                <input type="text" name="responsable" id="responsable" value="<?php echo $row[4] ?>">
            </div>
            <div class="mb-3">
                <button type="submit" >Guardar</button>
                <button type="reset" >Volver a lo predeterminado</button>
                <!-- <input class="form-control" type="submit" name=""> -->
            </div>

            <input type="hidden" name="id" id="id" value="<?php echo $row[0] ?>">
            
        </form>
        <div id="resp"></div>
    </div>

    <div class="container">
        <a href="index.html" type="button">Volver al principio</a>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="index.js"></script>
    <script>
        document.getElementById('activity-edit').addEventListener('submit', modact);
    </script>

</body>

</html>