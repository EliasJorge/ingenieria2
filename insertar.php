<?php

include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();		
include 'funciones.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />

	<title>insertar</title>

	<link type="text/css" rel="stylesheet" href="css/style-admin.css"/>

</head>

<body id="notas">
<?php 

	$opcion = $_REQUEST['opcion'];
	
//************** insertar publicacion ***************************************************************************
	if ($opcion == "publicacion")
	{
		$localidad= $_REQUEST['localidades'];
		$provincia=$_REQUEST['provincias'];
		$titulo=$_REQUEST['titulo'];
		$descripcion=$_REQUEST['descripcion'];
		$tipoHospedaje=$_REQUEST['alojamiento'];
		$cantidadHuespedes= $_REQUEST['huespedes'];
		$fechaDesde= $_REQUEST['fechaDesde'];
		$fechaHasta= $_REQUEST['fechaHasta'];
		
		if (($localidad) && ($titulo) && ($descripcion) && ($tipoHospedaje) && ($cantidadHuespedes) && ($fechaDesde) && ($fechaHasta))
		{
			$consulta= "INSERT INTO publicaciones(titulo,descripcion,id_provincia,id_localidad,capacidad,disp_desde,disp_hasta,id_talojamiento,estado) VALUES ('{$titulo}','{$descripcion}','{$provincia}','{$localidad}','{$cantidadHuespedes}','{$fechaDesde}','{$fechaHasta}','{$tipoHospedaje}','activo')";
		} else {
			header("location:crear_publicacion.php");
		}
	 
	}
//************** insertar tipo de hospedaje ***************************************************************************
	if ($opcion == "tipoHospehaje")
	{
		$tHospedaje= $_REQUEST['alojamiento'];
		
		if ($tHospedaje){
			if (validar_tipoAlojamiento ($tHospedaje)){
				$consulta = "INSERT INTO tipo_alojamiento(nombre) VALUES ('{$tHospedaje}')";
			} else {
					header("location:agregar_hospedaje.php?msj=error");
				
			}
					
		} else {
				 header("location:agregar_hospedaje.php?msj=vacio");

			}
	}
//************** insertar usuario ***************************************************************************

	if ($opcion == "usuario")
	{
			$usuario= $_REQUEST['usu'];
			$pass = $_REQUEST['contra1'];
			if (($usuario) && ($pass))
			{		
				if (validar_usuarioalta($usuario))
				{
				$consulta = "INSERT INTO usuarios(nombreusuario, clave) VALUES ('{$usuario}','{$pass}')";
				} 
					else {$consulta = false;
					echo "El nombre de usuario ingresado ya existe en la base de datos <br/>";

				}
			} else {
				 header("location:usuario.php?opcion=alta");				
				}
	}
//*********************************************************************************************************************

	
	mysql_query($consulta);
	
	
	
	if ($opcion == "publicacion")
	{
		if ($consulta)
		{
			$publicacion = mysql_insert_id();
			header ("Location: subir_imagen.php?id=$publicacion");
			//echo "Exito!";
			//printf("El ultimo registro insertado tiene id: %d\n", mysql_insert_id());
		} else {
			echo "No se pudo ingresar el registro - ";
			echo "Error mysql:".mysql_error();
		
		}
			
		
	} elseif ($opcion == "tipoHospehaje")
		{
			if ($consulta)
			{ 
				header("location:agregar_hospedaje.php?msj=exito");
			} else {
				echo "No se pudo ingresar el registro - ";
				echo "Error mysql:".mysql_error();
		
			}
			
		
		}elseif ($opcion == "edicion")
			{
				echo "<br/> <a href='nuevo.php?opcion=edicion'>volver</a>";
				
			}else 
				{
					echo "<br/> <a href='usuario.php?opcion=alta'>volver</a>";
				}
			
		
	mysql_close($con);
?>


</body>