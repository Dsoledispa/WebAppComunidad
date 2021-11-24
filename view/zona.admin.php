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
    <title>Document</title>
</head>
<body>
    <?php
    $sentencia=$pdo->prepare("SELECT * FROM tbl_voluntario");
    $sentencia->execute();
    echo  "<div>";
    echo  "<table>";
    echo  "<tr>";
    echo  "<th class='blue'>Nombre</th>";
    echo  "<th class='blue'>Apellido</th>";
    echo  "<th class='blue'>Correo</th>";
    echo  "<th class='blue'>DNI</th>";
    echo  "<th class='blue'>Edad</th>";
    echo  "<th class='blue'>Telefono</th>";
    echo  "</tr>";
    foreach ($sentencia as $localizacion) {
        //Ponemos primero la localización
        echo  "<tr>";
            echo "<td class='gris'>{$localizacion['nombre_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion['apellido_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion['correo_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion['dni_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion['edad_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion['telf_voluntario']}</td>";
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