<?php
	include 'funciones.php';
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	// Connect to server and select databse.
	$con = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$id = $_REQUEST['id'];//no reconoce id ?
	
	$consulta = "SELECT * FROM publicaciones WHERE id_publicacion = '$id'";
	$result= mysqli_query($con,$consulta) or die(mysqli_error($con));
	if(mysqli_num_rows($result))
	{
		$row = mysqli_fetch_array($result);
		$idU=$row["id_usuario"];
	}
	$sql="SELECT * FROM usuarios WHERE id_usuario=$idU";
	$perfil = mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($perfil))
    {
        $row = mysqli_fetch_array($perfil);
        $email = $row["email"];
        $nameu = $row["nombre"];
				$apellido=$row["apellido"];
				$tel = $row["telefono"];
    }
    else
    {
		echo '<script type="text/javascript">
					alert("El usuario no esta registrado o elimino su cuenta");
					window.location="cambiar_contrasenia.php"
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

	<section id="perfil">
		<div class="center">
			<h2>Perfil de <?=$nameu?> </h2>
		</div>
			<div class="center">
				<div id="perfil">
						<?php if ($row['tipo_foto'] == null){
							echo "<img class='img-circle' src='images/foto-de-perfil.png' width='150' height='150'/>";
						}else{ ?>
							<img src="imagenUsuario.php?id= <?php echo $idU ?>" class="img-circle" width="150" height="150" />
					<?php } ?>
						<br>
						<strong>Nombre:</strong> <?=$nameu?>
						<strong> </strong> <?=$apellido?>
						<br>
						<strong>Email:</strong> <?=$email?>
						<br>
						<strong>Telefono:</strong> <?=$tel?>
						<br>
				<?php 	
						$bus= "select AVG(valoracion) as puntuacion from valoracion_usuario where id_huesped = '$idU'";
						$res= busqueda($bus);
						if ($res[0]['puntuacion'] > 0){
								echo "<strong>Puntuacion: </strong>".number_format($res[0]['puntuacion'],2);
				?>
								<form method="POST" action='listado_puntuacionesU.php'>
									<div class="center">
										<input type="hidden" name="idU" id="idU" value="<?php echo $idU; ?>">
										<input type="hidden" name="idPub" id="idPub" value="<?php echo $id; ?>">
										<input class="btn btn-primary btn-md" id="valoracion" name="valoracion" type="submit" value="ver todas las calificaciones"/>
									</div>
						</form>
				<?php
						}else{
							echo "<strong>Puntuacion:</strong><p>El usuario no posee calificaciones</p>";
						}
				?>
				</div>
			</div>
	</section>	
	<section id="listados">
						<div class="center" id="listados">
						<hr/>
							<h2> Publicaciones </h2>
						<hr/>
					<?php
									$consulta = "SELECT * FROM publicaciones WHERE id_usuario='{$idU}'";
									$resultado = busqueda($consulta);
								?>
									<table class="table table hover" id="listados">
													<tr>
														<th>Fotos</th>
														<th>Titulo</th>
														<th>Descripcion</th>
														<th></th>
													</tr>
												<?php
												if(!empty($resultado)){
													foreach ($resultado as $r){?>
														<tr><?php
														if ($r['id_usuario'] == $idU){
															echo "<td><img src=imagen.php?id=$r[id_publicacion] id='imagen_lista' class='img-rounded'></td>";
															echo "<td><br><a href=mostrar_publicacion.php?id=$r[id_publicacion]>$r[titulo]</a></td>";
														?>
														<td><br><div class="descripcion"><?php echo $r['descripcion']; ?></div></td>
														<td>
															<div>
																<br>
																<input class="btn btn-primary btn-lg" type="button" value="Ver couch" onclick="window.location.href='mostrar_publicacion.php?id=<?php echo $r['id_publicacion'];?>'">
															</div>
														</td>
													</tr>
													<?php
														}
													}
												}?>
									</table>
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
