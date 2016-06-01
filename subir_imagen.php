<?php
	$opcion = $_REQUEST['id'];
	
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<title>couchinn</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">


	</head>
	<body>
		<div class="bg3">
			<fieldset>
				<legend>
					<h4>Añade imagenes a tu publicacion</h4>
				</legend>
				<form action="subir.php" method="POST" enctype="multipart/form-data">
					<label for="imagen">Imagen:</label>
					<input type="file" name="imagen" id="imagen" />
					<input type="submit" name="subir" value="Subir"/>
					<?php echo "<input type='hidden' name='publicacion' id='publicacion' value=$opcion>"; ?>
				</form>
			</fieldset>
		</div>
	</body>

</html>