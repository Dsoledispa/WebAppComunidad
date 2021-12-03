<?php
require_once "../services/connection.php";
session_start();
if ($_SESSION['email']=="") {
    header("location:menu.php");
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="../css/form.css" rel="stylesheet">
    <title>Formulario eventos</title>
</head>
<body>
    <?php
        $id_voluntario=$_GET['id_voluntario'];
        $sentencia1=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE id_voluntario=$id_voluntario");
        $sentencia1->execute();
        $row=$sentencia1->fetch(PDO::FETCH_ASSOC);
        $nombre_voluntario=$row['nombre_voluntario'];
        $apellido_voluntario=$row['apellido_voluntario'];
        $correo_voluntario=$row['correo_voluntario'];
        $dni_voluntario=$row['dni_voluntario'];
        $edad_voluntario=$row['edad_voluntario'];
        $telf_voluntario=$row['telf_voluntario'];
    ?>
    <div class="container">
		<div class="main">
			<div class="main-center">
			<h5>Introduce tus datos para inscribirte en el evento</h5>
                <form action="../proceses/modificarvoluntario.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <?php echo "<input type='text' class='form-control' name='nombre' id='name' placeholder='$nombre_voluntario'>";?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <?php echo "<input type='text' class='form-control' name='apellido' placeholder='$apellido_voluntario'>";?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <?php echo "<input type='email' class='form-control' name='email' placeholder='$correo_voluntario'>";?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <?php echo "<input type='text' class='form-control' name='dni' placeholder='$dni_voluntario'>";?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <?php echo "<input type='text' class='form-control' name='edad' placeholder='$edad_voluntario'>";?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="telf">Telefono</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <?php echo "<input type='text' class='form-control' name='telf' placeholder='$telf_voluntario'>";?>
                            </div>
                    </div>
                    <?php echo "<input type='hidden' name='id_voluntario' value=$id_voluntario>";?>
                    <button type="submit">ENVIAR</button> <!-- ENVIAR NUEVO (BOOTSTRAP) -->   
                </form>
			</div><!--main-center"-->
		</div><!--main-->
	</div><!--container-->
</body>
</html>
<?php
}
?>