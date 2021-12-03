<?php
session_start();
require_once '../services/connection.php';
if ($_SESSION['email']=="") {
    header("location:../view/menu.php");
}else {
    $nombre_evento=$_POST['nombre_evento'];
    $lugar_evento=$_POST['lugar_evento'];
    $fecha_inicio_evento=$_POST['fecha_inicio_evento'];
    $fecha_final_evento=$_POST['fecha_final_evento'];
    $descripcion=$_POST['descripcion'];
    $path="../img/".date('h-i-s-j-m-y')."-".$_FILES['file']['name'];
    $error=false;
    if (move_uploaded_file($_FILES['file']['tmp_name'],$path)) {
        try {
            $agregar=$pdo->prepare("INSERT INTO tbl_evento (nombre_evento, lugar_evento, fecha_inicio_evento, fecha_final_evento, descripcion, path, disponibilidad_evento) VALUES ('{$nombre_evento}', '{$lugar_evento}', '{$fecha_inicio_evento}', '{$fecha_final_evento}', '{$descripcion}', '{$path}', 1);");
            $agregar->execute();
        } catch (\Throwable $th){
            echo $th;
            $error=true;
            unlink($path);
        }
        if ($error) {
            header("Location:../view/zona.eventos.php?error=1");
        }else{
            header("Location:../view/zona.eventos.php");
        }
    }else {
        header("Location:../view/zona.eventos.php?error=1");
    }
}