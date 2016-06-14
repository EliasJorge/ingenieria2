<?php
	
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn</title>
	
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
			<div>
				<h2>Recuperar Contraseña</h2>
			</div>
			<?php
				$mail= $_POST['mail'];
				$sql="SELECT * FROM usuarios WHERE email='$mail'";
				$usuario = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
				if(mysqli_num_rows($usuario))
				{
			?>		
				<form action="actualizar_contrasenia.php" method="POST">
					<label>Nueva contraseña:</label>
					<br>
					<input type="password" required name="contrasenia"/>					
					<br>
					<label>Confirmar:</label>
					<br>
					<input type="password" required name="rcontrasenia" />
					<br><br>
					<input class="btn btn-primary btn-lg" type="submit" name="enviar" value="Enviar" />
					<input class="btn btn-primary btn-lg" type="button" name="Cancelar" value="Cancelar" OnClick= "self.location.href = 'index.php'">
					<input class="btn btn-primary btn-lg" type="hidden" name="mail" value="<?php echo $mail;?>" />   
				</form> 
			<?php
				}
				else
				{
					echo 	'<script type="text/javascript">
								alert("no existe el usuario ingresado");
								window.location="comprobar_mail.php"
							</script>';
				}
			?>
					
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