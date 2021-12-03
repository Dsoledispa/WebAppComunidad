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
    <div class="container">
		<div class="main">
			<div class="main-center">
			<h5>Introduce los datos para crear el evento</h5>
                <form action="../proceses/agregareventos.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="nombre_evento">Nombre del evento</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="nombre_evento" placeholder="Introduce el nombre">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="lugar_evento">Lugar del evento</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="lugar_evento" placeholder="Introduce el lugar"/>
                            </div>
                    </div>
                    <div class="form-group">
                    <label for="fecha_inicio_evento">Fecha inicio del evento</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="date" class="form-control" name="fecha_inicio_evento">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="fecha_final_evento">Fecha final del evento</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="date" class="form-control" name="fecha_final_evento">
                            </div>
                    </div>
                    <div class="form-group">
                    <label for="descripcion">Descripcion del evento</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="descripcion" placeholder="Descripcion"/>
                            </div>
                    </div>
                    <div class="form-group">
                    <label for="file">Imagen del evento</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="file" class="form-control" name="file" accept="image/*">
                            </div>
                    </div>
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