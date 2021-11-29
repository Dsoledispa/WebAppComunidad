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
    <form action="../proceses/agregarvoluntario.php" method="post">
        <div>
            <label for="nombre">Nombre</label><br>
            <input type="text" placeholder="Introduce el nombre" name="nombre" class="casilla">
        </div>
        <div>
            <label for="apellido">Apellido</label><br>
            <input type="text" placeholder="Introduce el apellido" name="apellido" class="casilla">
        </div>
        <div>
            <label for="correo">Correo</label><br>
            <input type="email" placeholder="Introduce el correo" name="email" class="casilla">
        </div>
        <div>
            <label for="dni">DNI</label><br>
            <input type="text" placeholder="Introduce el dni" name="dni" class="casilla">
        </div>
        <div>
            <label for="edad">Edad</label><br>
            <input type="text" placeholder="Introduce la edad" name="edad" class="casilla">
        </div>
        <div>
            <label for="telf">Telefono</label><br>
            <input type="text" placeholder="Introduce el numero de telefono" name="telf" class="casilla">
        </div>
        <div>
            <select name="evento" class="casilla">

                <?php
                        require_once "../services/connection.php";
                    $ubicacion=$pdo->prepare("SELECT * FROM tbl_evento");
                    $ubicacion->execute();
                    $listaoption=$ubicacion->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($listaoption as $row) {
                        echo "<option value='{$row['nombre_evento']}'>{$row['nombre_evento']}</option>";
                    }

                
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Enviar" name="filtrar" class="filtrar">
        </div>
    </form>
</body>

</html>