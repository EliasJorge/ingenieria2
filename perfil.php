<?php
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$mail= $_SESSION['mail'];
	$sql="SELECT * FROM usuarios WHERE email='$mail'";
	$perfil = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    if(mysqli_num_rows($perfil)) 
    { 
        $row = mysqli_fetch_array($perfil);
        $email = $row["email"];
        $nameu = $row["nombre"];
		$apellido=$row["apellido"];
        $id=$row["id_usuario"];	
		$foto = $row["foto"];
    }
    else 
    {
		echo '<script type="text/javascript">
					alert("El usuario no esta registrado o elimino su cuenta");
					window.location="cambiar_contraseña.php"
				</script>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<title>CouchInn-Perfil</title>
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
				<li id="registrar"><a>Perfil de <?=$nameu?> </a></li>
			</nav>
			<div class="main">
				<div id="fondo">
						<?php echo "<img class='imagen' src='imagenUsuario.php?id=$id' />"; ?>
						<br>
						<strong>Nombre:</strong> <?=$nameu?>
						<strong></strong> <?=$apellido?>
						<br>
						<strong>Email:</strong> <?=$email?>
						<br>
						<a href="modificar_datosU.php?mail=<?=$email?>">modificar mis datos</a>
						<br>
						<a href="cambiar_contrasenia.php">Cambiar contraseña</a>
						<br>
						<div id="listados">
						<?php
							$consulta = "SELECT * FROM publicaciones WHERE id_usuario=$id  ORDER BY titulo asc";
							$result = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
							while ($fila= mysqli_fetch_array($result))
							{
								$publicacion = $fila['id_publicacion'];				
								echo "<h3>"."<a href='mostrar_publicacion.php?id=$publicacion' >".htmlentities($fila['titulo'])."</a>"."</h3>";
								echo "<hr/>";			
							}
							mysqli_close($conexion);
						?> 
						</div>
				</div>
			</div>
			<div class="main">
			<ul class="foot">
						<li><a href="index.php">Inicio</a></li>
						<li><a href="index.php">Contacto</a></li>
						<li><a href="index.php">Acerca de nosotros</a></li>
						<li><a href="index.php">Ayuda</a></li>
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
</html>
