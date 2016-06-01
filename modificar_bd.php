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
	
		echo "Los datos se han modificado exitosamente";
	} else {
		header("location:modificar.php?opcion=tipo_alojamiento");		
		}
}
//**********************************************************************************************************************



mysql_close($con);


?>

