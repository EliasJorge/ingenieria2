<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn | Registrase</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

    <header id="header">
        
		<?php
		
			//---Incluimos la barra superior
			include_once('view/topBar.php');
			
			//---Incluimos el nav
			include_once('view/navBar.php');

		?>
		
    </header><!--/header-->
	<!-- Contenido de la pagina -->
	
	<section>
       <div class="center">
				<div id="fondo">
					<form  class="form-horizontal" action="registrar.php" method="post" enctype="multipart/form-data">	
						<h2>Registrarse</h2>
						<br>
						<label for="mail">Correo Electronico:</label> 							
						<br>
						<input type="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="mail" required placeholder="example@example.com">
						<br>
						<label for="nombre">Nombre:</label> 
						<br>
						<input type="text" name="nombre" value="" required size="20" onsubmit="return validateForm()"/>
						<br>
						<label for="apellidos">Apellidos:</label> 
						<br>
						<input type="text" name="apellidos" value="" required size="20" />
						<br>
						<label for="contrasenia">Contraseña:</label> 
						<br>
						<input type="password" name="contrasenia" value="" required maxlength="10" />
						<br>
						<label for="rcontrasenia">Repetir la contraseña:</label> 
						<br>
						<input type="password" name="rcontrasenia" value="" required maxlength="10" />
						<br><br>
						<input type="submit" class="btn btn-primary btn-lg" name="enviar" value="Guardar cambios" />
						<input type="reset" class="btn btn-primary btn-lg" name="limpiar" value="Borrar los datos introducidos" />
						<input type="button" class="btn btn-primary btn-lg" name="Cancelar" value="Cancelar" OnClick= "self.location.href = 'index.php'">
					</form>
				</div>
			</div>
    </section><!--/section-->
	
	<!-- /contenido -->
	
	<!-- Footer -->
	<?php
		
			//---Incluimos el footer
			include_once('view/footer.php');
			
	?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>