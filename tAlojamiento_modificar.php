<?php
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();	

?>
<?php 
$id = $_REQUEST['id'];
if (!$id)	// comprueba que se haya seleccionado un tipo de alojamiento para modificar
{ 	
	header("location:modificar.php?opcion=tipoAlojamiento"); // de no ser asi vuelve al menu de seleccion
}

$consulta= "select * from tipo_alojamiento where id_talojamiento = '$id'";
$resul= mysql_query($consulta);
$fila= mysql_fetch_array($resul);
$id= $fila['id_talojamiento'];
$nombre= $fila['nombre'];

//***************************************************************************************************************


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link type="text/css" rel="stylesheet" href="css/style-admin.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<title>Modificar tipo de hospedaje</title>
</head>

<body>
	<div >
    <form action="modificar_bd.php?opcion=alojamiento&id=<?php echo $id ?>" method="POST" name="alojamiento1">
    	
    	<fieldset>
			<legend>
				<h4>Modificar un nuevo tipo de hospedaje </h4>
			</legend>
			<input class="caja" name="alojamiento" type="text" size="60" maxlength="60"  value="<?php echo $fila['nombre']; ?>"/> <br/>
    	    <input id="button3" name="enviar" type="submit" value="guardar" />
    </form>
    </div>

</body>

</html>