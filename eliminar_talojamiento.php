<?php
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();	
	session_start();
?>

<?php 
	
		$consulta="SELECT * FROM tipo_alojamiento order by nombre"; 
		$result=mysql_query($consulta); 

		$opcion=""; 

		while ($fila=mysql_fetch_array($result)) { 

		    $id=$fila["id_talojamiento"]; 
		    $nombre=$fila["nombre"]; 
		    $opcion.="<OPTION VALUE=\"$id\">".$nombre."</option>"; 
		}
	
	mysql_close($con); // se cierra la conexion a la base de datos


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<title>eliminar tipo de alojamiento</title>
	
</head>

<body>
	<div class="bg3">
	<?php 
	$mensaje = $_REQUEST['msj'];
		if ($mensaje == "error"){
			echo '<script type="text/javascript">
					alert("El tipo de hospedaje elegido esta en uso, elimine primero las publicaciones en las que esta siendo utilizado");
					window.location="eliminar_talojamiento.php?msj=eliminar"
				</script>';
		} 
		elseif ($mensaje == "vacio")
		{
				echo '<script type="text/javascript">
									alert("el campo tipo de hospedaje esta vacio");
									window.location="eliminar_talojamiento.php?msj=eliminar"
								</script>';
		} 
		elseif ($mensaje == "exito")
		{
				echo '<script type="text/javascript">
						alert("el tipo de hospedaje fue eliminado con exito ");
						window.location="eliminar_talojamiento.php?msj=eliminar"
					</script>';		
		}

	?>
	</div>
	<div class="bg3">
		<fieldset>
			<legend>
				<h4>eliminar un tipo de hospedaje </h4>
			</legend>
			<?php
				echo "<form action='eliminar.php' method='POST' name='del'>";
			?>
				<SELECT NAME= "id"> 
				<OPTION VALUE=0>Seleccione... </option>
				<?=$opcion?> 
				</SELECT> 
				<input name="eliminar" type="submit" value="eliminar" />
			</form>
		</fieldset>
	</div>

</body>

</html>