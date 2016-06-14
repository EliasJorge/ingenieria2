<?php
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();	

include 'funciones.php';
?>
<?php 
$op = $_REQUEST['opcion'];
//************************ modificar alojamiento **********************************************************************
if ($op == 'alojamiento')
{
	$id= $_REQUEST['id'];
	if ($id){
		$nombre=$_REQUEST['alojamiento'];
		
		$consulta="update tipo_alojamiento set nombre = '$nombre' where id_talojamiento = '$id'";
	
		mysql_query($consulta);
	
		echo '<script type="text/javascript">
									alert("el tipo de hospedaje fue modificado con exito");
									window.location="listado_tHospedaje.php"
								</script>';
	} else {
		echo '<script type="text/javascript">
									alert("Ha ocurrido un error, intentelo nuevamente");
									window.location="modificar.php"
								</script>';		
		}
}
//**********************************************************************************************************************



mysql_close($con);


?>

