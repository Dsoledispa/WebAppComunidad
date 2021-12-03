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
    <title>Formulario voluntarios</title>
</head>

<body>
    <div class="container">
		<div class="main">
			<div class="main-center">
			<h5>Introduce tus datos para inscribirte en el evento</h5>
                <form action="../proceses/agregarvoluntario.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="nombre" id="name"  placeholder="Introduce tu nombre"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="apellido" placeholder="Introduce tu apellido"/>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Introduce tu correo"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="dni" placeholder="Introduce tu DNI"/>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="edad" placeholder="Introduce tu edad"/>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="telf">Telefono</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="telf" placeholder="Introduce tu numero de telefono"/>
                            </div>
                    </div>
                    <input type="hidden" name="id_evento" value="<?php $_GET['id_evento'] ?>">
                    <button type="submit">ENVIAR</button> <!-- ENVIAR NUEVO (BOOTSTRAP) -->   
                </form>
			</div><!--main-center"-->
		</div><!--main-->
	</div><!--container-->

    
</body>
</html>