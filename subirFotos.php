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
			$publicacion = $_REQUEST['idPub'];
			$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 16384;
			//print_r ($_FILES["imagen"]);
			if (isset($_FILES["imagen"])){
				
				if (!empty ($_FILES["imagen"]) and $_FILES["imagen"]["tmp_name"] != ""){
					if ($_FILES["imagen"]["error"][0] != 4){
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
									window.location="modificarPub.php?id=<?=$publicacion?>"
							</script>;
<?php						}
					} ?>
					<script type="text/javascript">
									alert("la publicacion se modifico correctamente");
									window.location="mostrar_publicacion.php?id=<?php echo $publicacion?>"
								</script>';
<?php 			} else {
					?>
							<script type="text/javascript">
									alert("No se ha seleccionado ninguna imagen, intentelo de nuevo");
									window.location="modificarPub.php?id=<?=$publicacion?>"
							</script>;
<?php
				}
			}}
		
?>

</body>