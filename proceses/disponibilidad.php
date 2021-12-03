<?php
require_once '../services/connection.php';
$stmt=$pdo->prepare("SELECT * FROM tbl_evento");
$stmt->execute();
foreach ($stmt as $row) {
    $contevento=$pdo->prepare("SELECT COUNT(*) FROM tbl_evento_voluntario GROUP BY id_evento HAVING id_evento={$row['id_evento']};");
    try {
        $contevento->execute();
        $some=$contevento->fetch(PDO::FETCH_ASSOC);
        if (!empty($some)){
            $contador = $some['COUNT(*)'];
            if($contador >= 3){
                $disponibilidad=$pdo->prepare("UPDATE tbl_evento SET disponibilidad_evento=0 WHERE id_evento={$row['id_evento']};");
                try {  
                    $pdo->beginTransaction();
                    $disponibilidad->execute();
                    $pdo->commit();
                    
                  } catch (Exception $e) {
                    $pdo->rollBack();
                    echo "Fallo: " . $e->getMessage();
                  }
            }
            if (empty($contador)) {
                echo "No se ha ejecutado bien la sentencia";
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}