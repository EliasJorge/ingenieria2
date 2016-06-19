<?php
session_start();
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
		$idU= $_SESSION['idU'];
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
		$consulta= "INSERT INTO publicaciones(id_usuario,titulo,descripcion,id_provincia,id_localidad,capacidad,disp_desde,disp_hasta,id_talojamiento,estado) VALUES ('{$idU}','{$titulo}','{$descripcion}','{$provincia}','{$localidad}','{$cantidadHuespedes}','{$fechaDesde}','{$fechaHasta}','{$tipoHospedaje}','activo')";
			
			
			
		} else {
			echo '<script type="text/javascript">
									alert("se rompio todo");
									window.location="crear_publicacion.php"
								</script>';
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
					echo '<script type="text/javascript">
									alert("el tipo de hospedaje ingresado ya existe");
									window.location="agregar_hospedaje.php?msj=hospedaje"
								</script>';
				
			}
					
		} else {
				 echo '<script type="text/javascript">
									alert("el campo tipo de hospedaje esta vacio");
									window.location="agregar_hospedaje.php?msj=hospedaje"
								</script>';

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
//************** insertar donación ***************************************************************************
	if ($opcion == "donar")
	{
		$usuario = $_SESSION['idU'];	
		$monto = $_REQUEST['monto'];
		$consulta = "INSERT INTO donaciones(id_usuario, monto, fecha_donacion) VALUES ('{$usuario}','{$monto}', CURRENT_DATE)";
	}
//*********************************************************************************************************************

	
	mysql_query($consulta);
	
	
	
	if ($opcion == "publicacion"){
		if ($consulta)
		{
			$publicacion = mysql_insert_id();
			$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 16384;
			if (isset($_FILES["imagen"])){
					$cantidad= count($_FILES["imagen"]["tmp_name"]);
					for ($i=0; $i<$cantidad; $i++){
						if (in_array($_FILES['imagen']['type'][$i], $permitidos) && $_FILES['imagen']['size'][$i] <= $limite_kb * 1024){
							//este es el archivo temporal
							$imagen_temporal  = $_FILES['imagen']['tmp_name'][$i];
							//este es el tipo de archivo
							$tipo = $_FILES['imagen']['type'][$i];
							//leer el archivo temporal en binario
							$fp     = fopen($imagen_temporal, 'r+b');
							$data = fread($fp, filesize($imagen_temporal));
							fclose($fp);

							//escapar los caracteres
							$data = mysql_real_escape_string($data);
							$resultado = @mysql_query("INSERT INTO imagenes (id_publicacion, imagen, tipo_imagen) VALUES ('$publicacion', '$data', '$tipo')") ;
							
						} else { ?>
							<script type="text/javascript">
									alert("archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes");
									window.location="mostrar_publicacion.php?id=<? =$publicacion?>"
							</script>;
<?php						}
					} ?>
					<script type="text/javascript">
									alert("la publicacion se subio correctamente");
									window.location="mostrar_publicacion.php?id=<?php echo $publicacion?>"
								</script>';
			<?php } else {
				echo "no hay imagen";
			}
		} else {
			echo "No se pudo ingresar el registro - ";
			echo "Error mysql:".mysql_error();
		
		}		
	} 
	elseif ($opcion == "tipoHospehaje"){
			if ($consulta){ 
				echo '<script type="text/javascript">
						alert("el tipo de hospedaje fue agregado con exito");
						window.location="listado_tHospedaje.php"
					</script>';
			} 
			else {
				echo "No se pudo ingresar el registro - ";
				echo "Error mysql:".mysql_error();		
			}		
	}
	elseif ($opcion == "edicion"){
		echo "<br/> <a href='nuevo.php?opcion=edicion'>volver</a>";
	}
	elseif ($opcion == "donar"){
			echo '<script type="text/javascript">
				alert ("Su donación se ha realizado correctamente");
				window.location="index.php"
				</script>';
	}
	else{
		echo "<br/> <a href='usuario.php?opcion=alta'>volver</a>";
	}	
		
	mysql_close($con);
?>


</body>