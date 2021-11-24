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
    $agregar=$pdo->prepare("INSERT INTO tbl_voluntario (nombre_voluntario,apellido_voluntario,correo_voluntario,dni_voluntario,edad_voluntario,telf_voluntario) VALUES ('{$nombre}','{$apellido}','{$email}','{$dni}',{$edad},{$telf});");
    try {
        $agregar->execute();
        if (empty($agregar)) {
            echo "No se ha ejecutado bien la sentencia";
        }else {
            header('location:../view/index.html');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else {
    header("location:../view/index.html");
}