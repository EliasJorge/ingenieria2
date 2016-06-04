<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
 	<title>Couchinn - Administracion</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<meta http-equiv="imagetoolbar" content="no" />
	
</head>
<body id='fondoVerde'>
	<div id="log">
    	<nav>					
					<ul id="menu" >
							<?php
							if(isset($_SESSION['loggedin'])) 
							{
							?>
								
								 <a href="perfil.php?mail=<?=$_SESSION['mail']?>">Bienvenido <strong><?=$_SESSION['nombre']?></strong></a>!  
								<a href="cerrar_sesion.php">Cerrar Sesion</a>
							<?php
							}
							else 
							{
								echo '<script type="text/javascript">
									alert("no esta autorizado para ver esta seccion");
									window.location="index.php"
								</script>';							
							}
							?>						
					</ul>
				</nav> 
    </div>
	
<div>	
	<div  class="left" id="lateral">
	<fieldset>
		<ul id="barra">
			<li><a href="listado_publicaciones.php" >ver publicaciones</a></li>
			<li><a href="#">tipo de hospedaje</a>
				<ul id="sub-barra">
					<li><a href="listado_tHospedaje.php" target="frame-contenido" >Ver lista de tipos de hospedajes</a></li>
					<li><a href="agregar_hospedaje.php?msj=hospedaje" target="frame-contenido" >Agregar</a></li>
					<li><a href="modificar.php?opcion=tipoAlojamiento" target="frame-contenido">Modificar</a></li>
					<li><a href="eliminar_talojamiento.php?msj=eliminar" target="frame-contenido">Eliminar</a></li>
				</ul>
			</li>	
			<li><a href="crear_publicacion.php">Publicar Hospedaje</a></li>
			<li><a href="#">Opciones</a>
				<ul id="sub-barra">
					<li><a href="#">Opcion 1</a></li>
					<li><a href="#">Opcion 2</a></li>
				</ul>
			</li>
		</ul>
	</fieldset>
	</div>
	<div class="main">
		<img src="images/logo-couchinn1.png" align="center" class="imagen" />
		<div class="contenido">
			<iframe name="frame-contenido" id="frame-admin"> </iframe>

		</div>
	</div>
</div>


</body>

</html>