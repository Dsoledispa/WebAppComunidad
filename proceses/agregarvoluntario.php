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
    $evento=$_POST["evento"];
    $agregarvoluntario=$pdo->prepare("INSERT INTO tbl_voluntario (nombre_voluntario,apellido_voluntario,correo_voluntario,dni_voluntario,edad_voluntario,telf_voluntario, habilitado_voluntario) VALUES ('{$nombre}','{$apellido}','{$email}','{$dni}',{$edad},{$telf}, 1);");
    $idvoluntario=$pdo->prepare("SELECT id_voluntario FROM tbl_voluntario WHERE nombre_voluntario = '{$nombre}'");
    $voluntarioevento=$pdo->prepare("INSERT INTO tbl_evento_voluntario (id_evento, id_voluntario) VALUES ({$evento}, ?);");
    try {
        $agregarvoluntario->execute();
        $idvoluntario->execute();
        $prueba=$idvoluntario->fetch(PDO::FETCH_ASSOC);
        $idv = $prueba['id_voluntario'];
        $voluntarioevento->bindParam(1, $idv);
        $voluntarioevento->execute();
        if (empty($agregarvoluntario) && empty($idvoluntario) && empty($voluntarioevento)) {
            echo "No se ha ejecutado bien la sentencia";
        }else {
            header('location:../view/menu.php');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else {
    header("location:../view/menu.php");
}