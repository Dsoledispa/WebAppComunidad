<?php
session_start();
require_once '../services/connection.php';
if ($_SESSION['email']=="") {
    header("location:../view/menu.php");
}else {
    $id_evento=$_GET['id_evento'];
    $disponibilidad=$pdo->prepare("UPDATE tbl_evento SET disponibilidad_evento='1' WHERE id_evento={$id_evento}");
    try {
        $pdo->beginTransaction();
        $disponibilidad->execute();
        if (empty($disponibilidad)) {
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