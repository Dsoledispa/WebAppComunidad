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
<form action="../proceses/agregareventos.php" method="post">
        <div>
            <label for="nombre_evento">Nombre del evento</label><br>
            <input type="text" placeholder="Introduce el nombre" name="nombre_evento" class="casilla">
        </div>
        <div>
            <label for="lugar_evento">Lugar del evento</label><br>
            <input type="text" placeholder="Introduce el lugar" name="lugar_evento" class="casilla">
        </div>
        <div>
            <label for="fecha_inicio_evento">Fecha inicio del evento</label><br>
            <input type="date" placeholder="Introduce la fecha de inicio" name="fecha_inicio_evento" class="casilla">
        </div>
        <div>
            <label for="fecha_final_evento">Fecha final del evento</label><br>
            <input type="date" placeholder="Introduce la fecha final" name="fecha_final_evento" class="casilla">
        </div>
        <div>
            <label for="descripcion">Descripcion del evento</label><br>
            <input type="text" placeholder="Descripcion" name="descripcion" class="casilla">
        </div>
        <div>
            <input type="submit" value="Enviar" name="filtrar" class="filtrar">
        </div>
    </form>
</body>
</html>
<?php
}
?>