<?php
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();	

include 'funciones.php';
?>
<?php 

//************************ eliminar alojamiento **********************************************************************

	$id= $_REQUEST['id'];
	if ($id){
		if (validar_usoAlojamiento ($id)){
		
			$consulta="delete from tipo_alojamiento where id_talojamiento = '$id'";
	
			mysql_query($consulta);	
			header("location:eliminar_talojamiento.php?msj=exito");
			
		} else {
		header("location:eliminar_talojamiento.php?msj=error");		
		}
	} else {
		header("location:eliminar_talojamiento.php?msj=vacio");		
		}
//**********************************************************************************************************************



mysql_close($con);


?>