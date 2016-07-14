<?php
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();
	$id = $_REQUEST['id'];
	$idUser= $_SESSION['idU'];
	$sql = "insert into reportes (id_publicacion, id_usuario) values ('$id','$idUser')";
	if (mysql_query($sql,$con)){
	echo '<script type="text/javascript">
			alert("El reporte se guardo correctamente");
			window.location="mostrar_publicacion.php?id=',$id,'"
		</script>';
	}
	else echo mysql_error($con);
?>