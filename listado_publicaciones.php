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
	
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	
</head>

<body>
	<div id="listados">
		<?php
		
			$consulta = "select * from publicaciones order by titulo asc";
			$result = mysql_query($consulta, $con);
	
			while ($fila= mysql_fetch_array($result)){
			
				$publicacion = $fila['id_publicacion'];				
				echo "<h3>"."<a href='mostrar_publicacion.php?id=$publicacion' >".htmlentities($fila['titulo'])."</a>"."</h3>";				
				
				echo "<hr/>";
				
			}
	
			mysql_close($con);
	
		?> 
	</div>
</body>