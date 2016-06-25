
<?php
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$mail= $_SESSION['mail'];
	$sql="SELECT * FROM usuarios WHERE email='$mail'";
	$perfil = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    if(mysqli_num_rows($perfil))
    { // Comprobamos que exista el registro con el mail ingresado
        $row = mysqli_fetch_array($perfil);
        $id=$row["id_usuario"];
        $nameu = $row["nombre"];
        $apellido= $row["apellido"];
        $telefono=$row["telefono"];
        $foto=$row["foto"];
    }
    else
    {
		echo '<script type="text/javascript">
					alert("El usuario no esta registrado o elimino su cuenta");
					window.location="perfil.php?mail=$mail"
				</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn</title>

	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

    <header id="header">

		<?php

			//---Incluimos la barra superior
			include_once('view/topBar.php');

			//---Incluimos el nav
			include_once('view/navBar.php');

		?>

    </header><!--/header-->

	<!-- Contenido de la pagina -->

	<section>
		<div class="center">
			<h2>Modificar mis datos </h2>
		</div>
			<div class="center">
				<div id="fondo">
					<?php
						if(isset($_SESSION['loggedin']))
						{ // comprobamos que la sesión esté iniciada
							if(isset($_POST['enviar']))
							{
								$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
								$apellido= mysqli_real_escape_string($conexion,$_POST['apellido']);
								$contrasenia= mysqli_real_escape_string($conexion,$_POST['contrasenia']);
								$telefono= mysqli_real_escape_string($conexion,$_POST['telefono']);
								if ( !isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
										echo '<script type="text/javascript">
											alert("ha ocurrido un error");
											window.location="perfil.php"
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
											$consulta="update usuarios set nombre='$nombre',contrasenia='$contrasenia',telefono='$telefono',apellido='$apellido',foto = '$data', tipo_foto = '$tipo' where id_usuario = '$id'";
								
											$sql = mysqli_query($conexion,$consulta);
											if($sql){
												echo '<script type="text/javascript">
													alert("datos cambiados correctamente");
													window.location="perfil.php"
													</script>';
											}	
												else
											{
													echo '<script type="text/javascript">
														alert("error, no se pudieron cambiar los datos");
														window.location="perfil.php"
													</script>';
											}
										} else {
												echo 	'<script type="text/javascript">
															alert("archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes");
															window.location="perfil.php"
														</script>';
										}
								}
						}
						else
						{
						?>
							<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
								<label for="nombre"> Nombre:</label>
								<br>
								<input type="text" name="nombre" value="<?=$nameu?>" required  onsubmit="return validateForm()"/>
								<br>
								<label for="apellido">Apellido:</label>
								<br>
								<input type="text" name="apellido" value="<?=$apellido?>" required  />
								<br>
								<label>Nueva contraseña:</label>
								<br>
								<input type="password" required name="contrasenia"/>
								<br>
								<label>Confirmar:</label>
								<br>
								<input type="password" required name="rcontrasenia" />
								<br>
								<label for="telefono">Telefono:</label>
								<br>
								<input type="text" name="telefono" value="<?=$telefono?>" required  />
								<br><br>
								<div class="center">
								Incluir foto <input  type="file" name="imagen" id="imagen" />
								</div>
								<br><br>
								<input class="btn btn-primary btn-lg" type="submit" name="enviar" value="Guardar cambios" />
								<input class="btn btn-primary btn-lg" type="reset" name="limpiar" value="Borrar los datos introducidos" />
								<input class="btn btn-primary btn-lg" type="button" name="Cancelar" value="Cancelar" OnClick= "self.location.href = 'perfil.php'">
							</form>
						<?php
						}
					}
					else
					{
						echo '<script type="text/javascript">
												alert("Acceso denegado, no posee permisos para ingresar a esta pagina");
												window.location="index.php"
											</script>';
					}
					?>
				</div>
			</div>
    </section><!--/section-->

	<!-- /contenido -->

	<!-- Footer -->
	<?php

			//---Incluimos el footer
			include_once('view/footer.php');

	?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
