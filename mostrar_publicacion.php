<?php

include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();		
include 'funciones.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<title>mi publicacion</title>
	
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	
</head>

<body>
<div class="main">
	<div class="right" id="content">

		<?php 
			$id = $_REQUEST['id'];
			$consulta = "select * from publicaciones where id_publicacion = '$id'";
			$result= mysql_query($consulta,$con);
		
			$fila= mysql_fetch_array($result);
			$fechaDesde= $fila['disp_desde'];
			$fechaHasta= $fila['disp_hasta'];
			$idProv= $fila['id_provincia'];
			$idLoc= $fila['id_localidad'];
			$capacidad= $fila['capacidad'];
			
			$consulta2 = "select * from lista_provincias where id = '$idProv'";
			$result2= mysql_query($consulta2,$con);
			$fila2= mysql_fetch_array($result2);
			
			$consulta3 = "select * from lista_localidades where id = '$idLoc'";
			$result3= mysql_query($consulta3,$con);
			$fila3= mysql_fetch_array($result3);
			
			echo "<h2>".htmlentities($fila['titulo'])."</h2>";
			echo "<h4> Disponible desde:".htmlentities($fechaDesde)."</h4>";
			echo "<h4> Disponible hasta:".htmlentities($fechaHasta)."</h4>";
			echo "<p>Capacidad: ".htmlentities($capacidad)."</p>";
			echo "<p>ubicado en: ".htmlentities($fila2['provincia']).", ".htmlentities($fila3['localidad'])."</p>";
			echo "<p>".htmlentities($fila['descripcion'])."</p>";
			//echo "<img src='imagen.php?id=$id' />";		

		?>
	</div>
	<div class="left" id="imagen">
		<?php 
		
			echo "<img class='imagen' src='imagen.php?id=$id' />";		

		?>

	</div>
</div>



</body>