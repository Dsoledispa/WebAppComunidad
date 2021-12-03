<?php
require_once '../services/connection.php';
if (isset($_POST['email'])) {
    session_start();
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $email=$_POST["email"];
    $dni=$_POST["dni"];
    $edad=$_POST["edad"];
    $telf=$_POST["telf"];
    $id_evento=$_POST["id_evento"];
    echo $id_evento;
    $agregarvoluntario=$pdo->prepare("INSERT INTO tbl_voluntario (nombre_voluntario,apellido_voluntario,correo_voluntario,dni_voluntario,edad_voluntario,telf_voluntario, habilitado_voluntario) VALUES ('{$nombre}','{$apellido}','{$email}','{$dni}',{$edad},{$telf}, 1);");
    /* $idvoluntario=$pdo->prepare("SELECT id_voluntario FROM tbl_voluntario WHERE nombre_voluntario = '{$nombre}'"); */
    $voluntarioevento=$pdo->prepare("INSERT INTO tbl_evento_voluntario (id_evento, id_voluntario) VALUES ({$id_evento}, ?);");
    try {
        $pdo->beginTransaction();
        $agregarvoluntario->execute();
        $id_voluntario = $pdo->lastInsertId();
        $voluntarioevento->bindParam(1, $id_voluntario);
        $voluntarioevento->execute();
        if (empty($agregarvoluntario) && empty($voluntarioevento)) {
            echo "No se ha ejecutado bien la sentencia";
        }else {
            /* header('location:../view/menu.php'); */
            echo "hola";
        }
        print $pdo->lastInsertId();
        $pdo->commit();
    } catch(PDOException $e) {
        $pdo->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
    }
}else {
    header("location:../view/menu.php");
}
/*         $idvoluntario->execute();
        $prueba=$idvoluntario->fetch(PDO::FETCH_ASSOC);
        $idv = $prueba['id_voluntario']; */