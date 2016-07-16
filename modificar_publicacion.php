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

	<title>modificar publicacion</title>

	<link type="text/css" rel="stylesheet" href="css/main.css"/>

</head>

<body>
<?php
		$idU= $_SESSION['idU']; //se recuperan los datos de los formularios
		$pub= $_REQUEST['idPub'];
		$localidad= $_REQUEST['localidades'];
		$provincia=$_REQUEST['provincias'];
		$titulo=$_REQUEST['titulo'];
		$descripcion=$_REQUEST['descripcion'];
		
		$tipoHospedaje=$_REQUEST['alojamiento'];
		$cantidadHuespedes= $_REQUEST['huespedes'];
		
		
		if (($provincia) && ($localidad) && ($titulo) && ($descripcion) && ($tipoHospedaje) && ($cantidadHuespedes))
			{		//se prepara la consulta con los datos basicos
					$consulta = "UPDATE publicaciones SET titulo = '$titulo', descripcion = '$descripcion', id_provincia = '$provincia', id_localidad = '$localidad', capacidad = '$cantidadHuespedes', id_talojamiento = '$tipoHospedaje'";
					if(isset($_POST['fechaDesde']) and isset($_POST['fechaHasta'])){ // se agrega a la consulta las fechas
						if(!empty($_POST['fechaDesde']) and !empty($_POST['fechaHasta'])){
							$desde=$_POST['fechaDesde'];
							$hasta=$_POST['fechaHasta'];
							$consulta = $consulta.", disp_desde = '$desde', disp_hasta = '$hasta'";
							
						}                    
						else{
							if(!empty($_POST['fechaDesde'])){ //se toman en cuenta todos los casos posibles
								$desde=$_POST['fechaDesde'];
								$consulta = $consulta.", disp_desde = '$desde'";
								
							}
							if(!empty($_POST['fechaHasta'])){
								$hasta=$_POST['fechaHasta'];
								$consulta = $consulta.", disp_hasta = '$hasta'";
							
							}
						}
					}
					$consulta= $consulta. " where id_publicacion = '$pub'"; // se completa la consulta
			
			} else { // si ocurrio algun error con los valores del formulario se informa del error   ?>
							<script type="text/javascript"> 
								alert("Complete todos los campos e intentelo nuevamente");
								window.location="modificarPub.php?id=<?php echo $pub?>"
							</script>; 
<?php			}
			

		mysql_query($consulta,$con); // se realiza la consulta
		
		if ($consulta) // si la consulta se realiza con exito
		{
			//si todo sale bien, se informa al usuario y se regresa a la publicacion	?>
					<script type="text/javascript">
						alert("la publicacion se modifico correctamente");
						window.location="mostrar_publicacion.php?id=<?php echo $pub?>"
					</script>';
	<?php 	 
		} else { // si no se pudo realizar la consulta, se devuelve el error devuelto por mysql
			echo "No se pudo ingresar el registro - ";
			echo "Error mysql:".mysql_error();

		}
	
	mysql_close($con); // se cierra la conexion a la base de datos
?>


</body>
