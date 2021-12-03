<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Documento</title>
</head>

<body>
    <button type="submit"><a type='button' href='login.html'>Acceder al login</a></button>
<br><br><br>
<div class="row">
    <?php
    require_once '../services/connection.php';
    require_once '../proceses/disponibilidad.php';
    $stmt=$pdo->prepare("SELECT * FROM tbl_evento where disponibilidad_evento=1");
    try{
        $pdo->beginTransaction();
        $stmt->execute();
        foreach ($stmt as $row) {
            echo "<div class='three-column'>";
            echo "<a href='voluntarios.php?id_evento={$row['id_evento']}'>";
            echo "<img src='".$row['path']."'alt='Fallo en la carga de base de datos'>";
            echo "</a>";
            echo "</div>";
        }
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Fallo: " . $e->getMessage();
      }
    ?>
</div>




</body>

</html>  