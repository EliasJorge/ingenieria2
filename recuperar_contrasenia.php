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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<title>couchinn</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/jquery-1.6.js" ></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>  
		<script type="text/javascript" src="js/Adamina_400.font.js"></script>
		<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
		<script type="text/javascript" src="js/script.js" ></script>
		<script type="text/javascript" src="js/kwicks-1.5.1.pack.js" ></script>
		<script type="text/javascript" src="js/atooltip.jquery.js"></script>
		
		
	</head>
	<body id="page1" >
		<div class="bg1">
			<div class="main">
				<img src="images/logo-couchinn1.png" align="center" />
			</div>
			<nav>
				<li id="registrar"><a>Recuperar Contraseña</a></li>
			</nav>
			<div class="main">
				<div id="fondo">
					
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
								<input type="submit" name="enviar" value="Enviar" />
								<input type="button" name="Cancelar" value="Cancelar" OnClick= "self.location.href = 'index.php'">
								<input type="hidden" name="mail" value="<?php echo $mail;?>" />   
							</form> 
						<?php
						}
						else
						{
							echo '<script type="text/javascript">
									alert("no existe el usuario ingresado");
									window.location="comprobar_mail.html"
								</script>';
						}
						?>
					
				</div>
			</div>
			<div class="main">
			<ul class="foot">
								<li class="active"><a href="login.php">iniciar sesion</a></li>
								<li><a href="index.php">contacto</a></li>
								<li><a href="index.php">acerca de nosotros</a></li>
								<li><a href="index.php">ayuda</a></li>
			</ul>
			</div>
			
			
		</div>
					
	</body>
</html>
	
