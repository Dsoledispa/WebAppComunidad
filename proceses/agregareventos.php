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
    $agregar=$pdo->prepare("INSERT INTO tbl_evento (nombre_evento, lugar_evento, fecha_inicio_evento, fecha_final_evento, descripcion, disponibilidad_evento) VALUES ('{$nombre_evento}', '{$lugar_evento}', '{$fecha_inicio_evento}', '{$fecha_final_evento}', '{$descripcion}', 1);");
    try {
        $agregar->execute();
        if (empty($agregar)) {
            echo "No se ha ejecutado bien la sentencia";
        }else {
            header('location:../view/zona.admin.php');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}