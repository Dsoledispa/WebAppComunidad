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
    <title>Document</title>
</head>
<body>
    <button type="submit"><a type='button' href='index.html'>Volver a la pagina de inicio</a></button>
    <button type="submit"><a type='button' href='eventos.php'>Crear eventos</a></button>
    <?php
    $sentencia1=$pdo->prepare("SELECT * FROM tbl_voluntario");
    $sentencia1->execute();
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
    foreach ($sentencia1 as $localizacion1) {
        //Ponemos primero la localización
        echo  "<tr>";
            echo "<td class='gris'>{$localizacion1['nombre_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion1['apellido_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion1['correo_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion1['dni_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion1['edad_voluntario']}</td>";
            echo "<td class='gris'>{$localizacion1['telf_voluntario']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    ?>
    <br>
    <br>
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
    echo  "</tr>";
    foreach ($sentencia2 as $localizacion2) {
        //Ponemos primero la localización
        echo  "<tr>";
            echo "<td class='gris'>{$localizacion2['nombre_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['lugar_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['fecha_inicio_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['fecha_final_evento']}</td>";
            echo "<td class='gris'>{$localizacion2['descripcion']}</td>";
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