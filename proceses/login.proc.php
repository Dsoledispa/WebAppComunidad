<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    session_start();
    require_once '../services/connection.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_admin WHERE correo_admin='$email' and pass_admin=MD5('{$password}')");
    $stmt->execute();
    $comprobacion=$stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
            if (!empty($comprobacion)) {
                foreach ($comprobacion as $row) {
                    $_SESSION['nombre_admin']=$row['nombre_admin'];
                 }   
                $_SESSION['email']=$email;
                header("location:../view/zona.admin.php");
            }else {
                header("location: ../view/menu.php");
            }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location: ../view/menu.php");
}