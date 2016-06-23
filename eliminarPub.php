<?php
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();	

include 'funciones.php';
?>
<?php 

//************************ eliminar alojamiento **********************************************************************

	$id= $_REQUEST['id'];
	if ($id){
		if (validar_eliminarPub ($id)){
		
			$consulta="update publicaciones set estado = 'eliminada' where id_publicacion = '$id'";
	
			mysql_query($consulta);	
			echo 	'<script type="text/javascript">
						alert("la publicacion fue eliminada con exito ");
						window.location="index.php"
					</script>';
			
		} else {?>
				<script type="text/javascript">
					alert("La publicacion tiene reservas aceptadas, cancele primero las solicitudes para poder continuar");
					window.location="mostrar_publicacion.php?id=<?php echo $id; ?>"
				</script><?php		
		}
	} else {
		echo 	'<script type="text/javascript">
					alert("ha ocurrido un error, intente de nuevo");
					window.location="index.php"
				</script>';		
		}
//**********************************************************************************************************************



mysql_close($con);


?>