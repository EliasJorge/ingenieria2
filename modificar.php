<?php
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();	
	session_start();
?>

<?php 
	$op= $_REQUEST['opcion'];
	if ($op == 'tipoAlojamiento')
	{
		$consulta="SELECT * FROM tipo_alojamiento order by nombre"; 
		$result=mysql_query($consulta); 

		$opcion=""; 

		while ($fila=mysql_fetch_array($result)) { 

		    $id=$fila["id_talojamiento"]; 
		    $nombre=$fila["nombre"]; 
		    $opcion.="<OPTION VALUE=\"$id\">".$nombre."</option>"; 
		}
	}
	if ($op == 'edicion')
	{
		$consulta="SELECT * FROM ediciones"; 
		$result=mysql_query($consulta); 

		$opcion=""; 

		while ($fila=mysql_fetch_array($result)) { 

	    	$id=$fila["id"]; 
    		$edicion=$fila["fecha"]; 
    		$opcion.="<OPTION VALUE=\"$id\">".$edicion."</option>"; 
	
		} 
	}
	if ($op == 'autor')
	{
		$consulta="SELECT * FROM autores order by apellido"; 
		$result=mysql_query($consulta); 

		$opcion="";
		while ($fila=mysql_fetch_array($result)) 
		{ 
			$id=$fila["id"]; 
    		$autor=$fila["apellido"].", ".$fila["nombre"]; 
    		$opcion.="<OPTION VALUE=\"$id\">".$autor."</option>"; 
		} 	
	}

	mysql_close($con); // se cierra la conexion a la base de datos


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link type="text/css" rel="stylesheet" href="css/style-admin.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<title>Modificar</title>
</head>

<body>
	<fieldset>
	<?php
	     if ($op == "autor")
		 {
			echo "<form action='form_modificar.php?opcion=autor' method='POST' name='mod'>";
		 }elseif ($op == "edicion")
		 	{
				echo "<form action='form_modificar.php?opcion=edicion' method='POST' name='mod'>";
			 } else {
					echo "<legend> <h3> Modificar un tipo de alojamiento </h3> </legend>";
					echo "<form action='tAlojamiento_modificar.php' method='POST' name='mod'>";
			 }
	?>
    	<SELECT NAME= "id"> 
		<OPTION VALUE=0>Seleccione... </option>
		<?=$opcion?> 
		</SELECT> 
        <input name="modificar" type="submit" value="modificar" />
    </form>
	</fieldset>


</body>

</html>