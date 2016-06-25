<?php
//conexion a la base de datos
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();

//comprobamos si ha ocurrido un error.
if ( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
{
			echo '<script type="text/javascript">
						alert("ha ocurrido un error");
						window.location="crear_publicacion.php"
					</script>';
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 16MB
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 16384;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){

		//este es el archivo temporal
		$imagen_temporal  = $_FILES['imagen']['tmp_name'];
		//este es el tipo de archivo
		$tipo = $_FILES['imagen']['type'];
		//leer el archivo temporal en binario
                $fp     = fopen($imagen_temporal, 'r+b');
                $data = fread($fp, filesize($imagen_temporal));
                fclose($fp);

                //escapar los caracteres
                $data = mysql_real_escape_string($data);
				
		$consulta="update usuarios set foto = '$data', tipo_foto = '$tipo' where id_usuario = '7'";
		$resultado = @mysql_query($consulta) ;

		if ($resultado){
			echo '<script type="text/javascript">
									alert("la publicacion se subio correctamente");
									window.location="subir_imagen.php"
								</script>';
		} else {
			echo '<script type="text/javascript">
									alert("ocurrio un error al ingresar los datos");
									window.location="subir_imagen.php"
								</script>';
		}
	} else {
		echo '<script type="text/javascript">
					alert("archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes");
					window.location="subir_imagen.php"
			</script>';
	}
}
mysql_close($con);
?>
