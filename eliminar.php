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
			echo 	'<script type="text/javascript">
						alert("el tipo de hospedaje fue eliminado con exito ");
						window.location="listado_tHospedaje.php"
					</script>';
			
		} else {
		echo 	'<script type="text/javascript">
					alert("El tipo de hospedaje elegido esta en uso, elimine primero las publicaciones en las que esta siendo utilizado");
					window.location="eliminar_talojamiento.php"
				</script>';		
		}
	} else {
		echo 	'<script type="text/javascript">
					alert("el campo tipo de hospedaje esta vacio");
					window.location="eliminar_talojamiento.php"
				</script>';		
		}
//**********************************************************************************************************************



mysql_close($con);


?>