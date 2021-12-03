<?php
require_once "../services/connection.php";
session_start();
if ($_SESSION['email']=="") {
    header("location:login.html");
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Zona eventos</title>
</head>
<body>
    <button type="submit"><a type='button' href='formularioeventos.php'>Crear eventos</a></button>
    <button type="submit"><a type='button' href='zona.voluntarios.php'>Acceder a voluntarios</a></button>
    <button type="submit"><a type='button' href="../proceses/logout.proc.php">Logout</a></button>
    <?php
    $sentencia2=$pdo->prepare("SELECT * FROM tbl_evento");
    $sentencia2->execute();
    echo  "<div>";
    echo  "<table>";
    echo  "<tr>";
    echo  "<th class='blue'>Nombre</th>";
    echo  "<th class='blue'>Lugar</th>";
    echo  "<th class='blue'>Fecha_inicio</th>";
    echo  "<th class='blue'>Fecha-final</th>";
    echo  "<th class='blue'>Descripcion</th>";
    echo  "<th class='blue'>Disponibilidad</th>";
    echo  "</tr>";
    foreach ($sentencia2 as $localizacion2) {
        //Ponemos primero la localización
        echo  "<tr>";
            echo "<td class='gris'>{$localizacion2['nombre_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['lugar_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['fecha_inicio_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['fecha_final_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['descripcion']}</td>";
            if ($localizacion2['disponibilidad_evento']==1) {
                echo "<td class='gris'><i class='fas fa-check green'></i></td>";
                echo "<td><button type='submit'><a type='button' href='../proceses/desactivardisponibilidad.php?id_evento={$localizacion2['id_evento']}'>Deshabilitar evento</a></button></td>";
            }else{
                echo "<td class='gris'><i class='fas fa-times red'></i></td>";
                echo "<td><button type='submit'><a type='button' href='../proceses/activardisponibilidad.php?id_evento={$localizacion2['id_evento']}'>Habilitar evento</a></button></td>";
            }
            echo "<td><button type='submit'><a type='button' href='modeventos.php?id_evento={$localizacion2['id_evento']}'>Modificar evento</a></button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    ?>
</body>
</html>
<?php
}
?>