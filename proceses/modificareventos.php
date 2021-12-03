<?php
session_start();
require_once '../services/connection.php';
if ($_SESSION['email']=="") {
    header("location:../view/menu.php");
}else {
    $nombre_evento=$_POST["nombre_evento"];
    $lugar_evento=$_POST["lugar_evento"];
    $fecha_inicio_evento=$_POST["fecha_inicio_evento"];
    $fecha_final_evento=$_POST["fecha_final_evento"];
    $descripcion=$_POST["descripcion"];
    $path="../img/".date('h-i-s-j-m-y')."-".$_FILES['file']['name'];
    $id_evento=$_POST["id_evento"];
    $ruta=0;
    $data = array();
    if (!empty($nombre_evento)){
        $data[]="nombre_evento = '{$nombre_evento}'";
    }
    if (!empty($lugar_evento)){
        $data[]="lugar_evento = '{$lugar_evento}'";
    }
    if (!empty($fecha_inicio_evento)){
        $data[]="fecha_inicio_evento = '{$fecha_inicio_evento}'";
    }
    if (!empty($fecha_final_evento)){
        $data[]="fecha_final_evento = '{$fecha_final_evento}'";
    }
    if (!empty($descripcion)){
        $data[]="descripcion = '{$descripcion}'";
    }
    if (!empty($_FILES['file']['name'])){
        $data[]="path = '{$path}'";
        $ruta=1;
    }
    $anadir= implode(',',$data);
    $error=false;
    print_r($anadir);
    $modificarevento=$pdo->prepare("UPDATE tbl_evento SET {$anadir} WHERE id_evento = {$id_evento};");
    if ($ruta==1){
        if (move_uploaded_file($_FILES['file']['tmp_name'],$path)) {
            try {
                $modificarevento->execute();
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
            header("Location:../view/zona.eventos.php?error=2");
        }
    }else {
        try {
            $pdo->beginTransaction();
            $modificarevento->execute();
            if (empty($modificarevento)) {
                echo "No se ha ejecutado bien la sentencia";
            }else {
                header('location:../view/zona.eventos.php');
            }
            $pdo->commit();
        } catch(PDOException $e) {
            $pdo->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
    }
}