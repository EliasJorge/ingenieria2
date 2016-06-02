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
				<li id="registrar">
					<a>Ingresar en CouchInn <a>
				</li>
			</nav>
			<div class="main">
				<div id="fondo"> 
					<form name="form1" method="post" action="check-login.php">
						<label>Correo Electronico:</label>
						<br>
						<input name="mail" type="e-mail" id="mail">
						<br>
						<label>Contraseña:</label>
						<br>
						<input name="password" type="password" id="password">
						<br><br>
						<input type="submit" name="Submit" value="Ingresar">
					</form>
				</div>
			</div>
			<div class="main">
			<ul class="foot">
								<li><a href="registro.php">registrarse</a></li>
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
