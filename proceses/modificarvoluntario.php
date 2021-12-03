<?php
session_start();
require_once '../services/connection.php';
if ($_SESSION['email']=="") {
    header("location:../view/menu.php");
}else {
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $email=$_POST["email"];
    $dni=$_POST["dni"];
    $edad=$_POST["edad"];
    $telf=$_POST["telf"];
    $id_voluntario=$_POST["id_voluntario"];
    $data = array();
    if (!empty($nombre)){
        $data[]="nombre_voluntario = '{$nombre}'";
    }
    if (!empty($apellido)){
        $data[]="apellido_voluntario = '{$apellido}'";
    }
    if (!empty($email)){
        $data[]="correo_voluntario = '{$email}'";
    }
    if (!empty($dni)){
        $data[]="dni_voluntario = '{$dni}'";
    }
    if (!empty($edad)){
        $data[]="edad_voluntario = {$edad}";
    }
    if (!empty($telf)){
        $data[]="telf_voluntario = {$telf}";
    }
    $anadir= implode(',',$data);
    $modificarvoluntario=$pdo->prepare("UPDATE tbl_voluntario SET {$anadir} WHERE id_voluntario = {$id_voluntario};");
    try {
        $pdo->beginTransaction();
        $modificarvoluntario->execute();
        if (empty($modificarvoluntario)) {
            echo "No se ha ejecutado bien la sentencia";
        }else {
            header('location:../view/zona.voluntarios.php');
        }
        $pdo->commit();
    } catch(PDOException $e) {
        $pdo->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
    }
}