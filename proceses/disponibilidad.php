<?php
    require_once "../services/connection.php";
    $contevento=$pdo->prepare("SELECT COUNT(*) FROM tbl_evento_voluntario GROUP BY id_evento HAVING id_evento=5;");
    $contevento->execute();
    $some=$contevento->fetch(PDO::FETCH_ASSOC);
    $contador = $some['COUNT(*)'];
    if($contador >= 3){
        $disponibilidad=$pdo->prepare("UPDATE tbl_evento SET disponibilidad_evento=0 WHERE id_evento=5;");
        $disponibilidad->execute();
    }
    $ubicacion=$pdo->prepare("SELECT * FROM tbl_evento WHERE disponibilidad_evento=1;");
    $ubicacion->execute();
    $listaoption=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($listaoption as $row) {
        echo "<option value='{$row['id_evento']}'>{$row['nombre_evento']}</option>";
    }

?>