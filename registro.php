<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<title>CouchInn</title>
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
				<li id="registrar">
					<a>Crea tu cuenta de CouchInn</a>
				</li>
			</nav>
			<div class="main">
				<div id="fondo">
					<form  action="registrar.php" method="post" enctype="multipart/form-data">	
						<label for="mail">Correo Electronico:</label> 							
						<br>
						<input type="e-mail" name="mail" required value="example@example.com"/>
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
						<input type="submit" name="enviar" value="Guardar cambios" />
						<input type="reset" name="limpiar" value="Borrar los datos introducidos" />
					</form>
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
			<script type="text/javascript"> Cufon.now(); </script>
		
			<script>
				$(document).ready(function()
				{
					$('.kwicks').kwicks(
					{
						max : 500,
						spacing : 0,
						event : 'mouseover'
					});
							   
				})
			</script>
		
	</body>
</html 	>
