<?php
	session_start();
?>
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
	<body  class="bg1" >
		<div class="bg1">
			<div class="main">
				<img src="images/logo-couchinn1.png" style= "height:200px; align:center"/>
				</div>
				<nav>					
					<ul id="menu" >
						<form method="POST" action="buscador.php">
							<label>Destino:</label>
							<input type="text" name="destino" id="destino" size="20" onClick="location.href = 'buscador.php'"/>
							<label> Fecha Inicio:</label>
							<input type="date" name="datepicker" id="datepicker" size="10" />
							<label> Fecha Fin:</label>
							<input type="date" name="datepicker" id="datepicker" size="10" />
							<label> huespedes:</label>
							<SELECT NAME= 'huespedes'>
							<OPTION VALUE=0></option>
							<OPTION VALUE=1>1</option>
							<OPTION VALUE=2>2</option>
							<OPTION VALUE=3>3</option>
							<OPTION VALUE=4>4</option>
							<OPTION VALUE=5>5 </option>			
							</SELECT> 
							<input name='buscar' type='submit' value='buscar' />
							<?php
							if(isset($_SESSION['loggedin'])) 
							{
							?>
								
								 <a href="perfil.php?mail=<?=$_SESSION['mail']?>">Bienvenido <strong><?=$_SESSION['nombre']?></strong></a>!  
								<a href="cerrar_sesion.php">Cerrar Sesión</a>
							<?php
							}
							else 
							{
							?>
							<a href="registro.php">Registrarse</a> | <a href="login.php">Iniciar Sesion</a>
							<?php
							}
							?>
							
							
						</form>
						<div>
							<?php
							if(isset($_SESSION['loggedin'])) 
							{
							?>
								<a href="admin.php">Mas opciones</a>
							<?php
							}
							?>
						</div>
						
					</ul>
				</nav> 
			</div>
			<div class="main">
				<div class="wrapper">
					<div class="kwicks-wrapper marg_bot1">
						<ul class="kwicks horizontal"> <!-- las imagenes deben tener 640x414px -->
							<li><a href="mostrar_publicacion.php?id=19"><img src="images/bariloche-640x414.jpg" alt=""> </a></li>
							<li><a href="mostrar_publicacion.php?id=18"><img src="images/cafayate-640x414.jpg" alt=""></a></li>
							<li><a href="mostrar_publicacion.php?id=17"><img src="images/mar-del-plata-640x414.jpg" alt=""></a></li>
							<li><a href="mostrar_publicacion.php?id=16"><img src="images/tilcara-640x414.jpg" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main">
			<ul class="foot">
								<li><a href="listado_publicaciones.php">Ver Publicaciones</a></li>
								<li class="active"><a href="login.php">iniciar sesion</a></li>
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
