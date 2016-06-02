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
				<li id="registrar"><a>Cambiar Contraseña</a></li>
			</nav>
			<div class="main">
				<div id="fondo">
				<head>
					<meta charset="UTF-8">
					<title>Cambiar Contraseña</title>
				</head>
				<body>
    <?php
				if(isset($_SESSION['loggedin'])) 
				{ // comprobamos que la sesión esté iniciada
					if(isset($_POST['enviar'])) 
					{
						if($_POST['contrasenia'] != $_POST['rcontraenia']) 
						{
								echo '<script type="text/javascript">
									alert("las contraseñas ingresadas no coinciden");
									window.location="cambiar_contraseña.php"
								</script>';
						}
						else 
						{
							$nameu = $_SESSION['nombre'];
							$contrasenia = mysqli_real_escape_string($_POST['contrasenia']);
							$sql = mysqli_query("UPDATE usuarios SET contrasenia='".$contrasenia."' WHERE nombre='".$nombre."'");
							if($sql) 
							{
								echo '<script type="text/javascript">
									alert("contraseña cambada correctamente");
									window.location="index.php"
								</script>';
							}
							else 
							{
								echo '<script type="text/javascript">
									alert("error, no se pudo cambiar la contraseña");
									window.location="cambiar_contraseña.php"
								</script>';
							}
						}
					}
					else 
					{
    ?>
						<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
							<label>Nueva contraseña:</label>
							<br>
							<input type="password" name="contrasenia"/>
							<br>
							<label>Confirmar:</label>
							<br>
							<input type="password" name="rcontrasenia" />
							<br>
							<input type="submit" name="enviar" value="Enviar" /> 
							<input type="button" name="Cancelar" value="Cancelar" OnClick= "self.location.href = 'index.php'">
						   
						</form>
    <?php
					}
				}
				else 
				{
					echo '<script type="text/javascript">
									alert("acceso denegado");
									window.location="cambiar_contraseña.php"
								</script>';
				}
    ?> 
				</body>
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
			<div class="main" id="pie"></div>
			
		</div>
			<script type="text/javascript"> Cufon.now(); </script>
		
		<script>
				$(document).ready(function(){
					$('.kwicks').kwicks({
						max : 500,
						spacing : 0,
						event : 'mouseover'
					});
							   
				})
		</script>
		
	</body>
</html 	>
