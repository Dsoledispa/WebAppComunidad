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
                    //zona para todos los eventos
                    /* $listaeventos=$pdo->prepare("SELECT id_evento FROM tbl_evento;");
                    $listaeventos->execute(); */
                    //zona para todos los eventos
                    //si hay mas voluntarios que plazas para el evento, este se cierra
                    $contevento=$pdo->prepare("SELECT COUNT(*) FROM tbl_evento_voluntario GROUP BY id_evento HAVING id_evento=5;");
                    $contevento->execute();
                    $some=$contevento->fetch(PDO::FETCH_ASSOC);
                    $contador = $some['COUNT(*)'];
                    if($contador >= 3){
                        $disponibilidad=$pdo->prepare("UPDATE tbl_evento SET disponibilidad_evento=0 WHERE id_evento=5;");
                        $disponibilidad->execute();
                    }
                    //por si no llego mira la linea de abajo
                    //hay que procesar estas lineas por cada evento
                    $dispo=$pdo->prepare("SELECT disponibilidad_evento FROM tbl_evento WHERE id_evento = 5;");
                    $dispo->execute();
                    $dato=$dispo->fetch(PDO::FETCH_ASSOC);
                    $datodispo = $dato['disponibilidad_evento'];
                    $ubicacion=$pdo->prepare("SELECT * FROM tbl_evento WHERE disponibilidad_evento={$datodispo}");
                    $ubicacion->execute();
                    $listaoption=$ubicacion->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($listaoption as $row) {
                        echo "<option value='{$row['id_evento']}'>{$row['nombre_evento']}</option>";
                    }

                
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Enviar" name="filtrar" class="filtrar">
        </div>
    </form>
    <?php
        $listaeventos=$pdo->prepare("SELECT id_evento FROM tbl_evento;");
        $listaeventos->execute();
        print_r($listaeventos);
    ?>
</body>

</html>