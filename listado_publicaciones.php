<?php

include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();		
include 'funciones.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<title>hospedajes en couchinn</title>
	
	<meta charset="utf-8">
	<meta http-equiv="imagetoolbar" content="no" />

	
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	
</head>

<body id="fondoVerde">
	<div class="main" id="listado">
		<div id="menu-wrap">
			<ul id="tab">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="#">Sobre Nosotros</a></li>
				<li><a href="#">Contacto</a></li>
				<li><a href="#">Opciones</a>
					<ul id="sub-tab">
						<li><a href="#">Opcion 1</a></li>
						<li><a href="#">Opcion 2</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<?php
		
			$consulta = "select * from publicaciones order by titulo asc";
			$result = mysql_query($consulta, $con);
			
			echo "<hr/>";
	
			while ($fila= mysql_fetch_array($result)){
				
		
				$publicacion = $fila['id_publicacion'];				
				echo "<a href='mostrar_publicacion.php?id=$publicacion' >"."<img class='imagen_lista' src='imagen.php?id=$publicacion' />"." "."<h3>".htmlentities($fila['titulo'])."</a>"."</h3>";				
				
				echo "<hr/>";
				
			}
	
			mysql_close($con);
	
		?> 
	</div>
</body>