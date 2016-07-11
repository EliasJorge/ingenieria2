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

	<title>Subir fotos</title>

	<link type="text/css" rel="stylesheet" href="css/main.css"/>

</head>

<body>
<?php
			$pub = $_REQUEST['idPub'];
			if(isset($_REQUEST['fotos'])) {  //si se seleccionaron fotos para eliminar
				if(!empty($_REQUEST['fotos'])) {
					$fotos=$_REQUEST['fotos'];
					$count = count($fotos);
					$sql= "select * from imagenes where id_publicacion = '$pub'";
					$busc = mysql_query($sql, $con);
					$r = mysql_num_rows($busc);
					if ($count == $r){	//chequeamos si se seleccionaron todas las fotos
						?>
							<script type="text/javascript"> //se alerta de la situcacion
								alert("No se completo la operacion, la publicacion debe contener al menos una imagen");
								window.location="modificarPub.php?id=<?php echo $pub?>"
							</script>';
<?php				}else{ // si no se seleccionaron todas o si elegi subir una foto nueva
							for ($i = 0; $i < $count; $i++) {
								$elimina= "delete from imagenes where id_imagen = '$fotos[$i]'"; // se eliminan las fotos seleccionadas
								$consu = mysql_query($elimina, $con);
							}
							?>
							<script type="text/javascript"> //se alerta de la situcacion
								alert("La publicacion se modifico con exito");
								window.location="mostrar_publicacion.php?id=<?php echo $pub?>"
							</script>';
<?php						
					}
				}else{ // si no se seleccionaron 
						?>
							<script type="text/javascript"> //se alerta de la situcacion
								alert("No se seleccionaron imagenes para eliminar");
								window.location="modificarPub.php?id=<?php echo $pub?>"
							</script>';
<?php			}
			}
				
			
			
?>

</body>