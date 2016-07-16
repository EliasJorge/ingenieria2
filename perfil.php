<?php
	session_start();
	include 'funciones.php';
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$con = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");	
	if(!isset($_SESSION['loggedin'])){
		echo '<script type="text/javascript">
				alert("no esta autorizado para ver esta seccion");
				window.location="index.php"
			</script>';
	}
	else {
		if(isset($_GET['mail'])) {
			$mail = $_GET['mail'];
			$sql="SELECT * FROM usuarios WHERE email='$mail' and estado <> 'eliminado'";
			$perfil = mysqli_query($con, $sql) or die(mysqli_error($con));
			if($row = mysqli_fetch_assoc($perfil)){
				$email = $row["email"];
				$nameu = $row["nombre"];
				$apellido=$row["apellido"];
				$idVisitante=$row["id_usuario"];
				$tel = $row["telefono"];
			}
			else {
				echo '<script type="text/javascript">
						alert("El usuario fue eliminado");
						window.location="history.back()"
					</script>';
			}
		}
		else {
			$email = $_SESSION['mail'];
			$nameu = $_SESSION['nombre'];
			$apellido = $_SESSION['apellido'];
			$idVisitante = $_SESSION['idU'];
			$tel = $_SESSION['telefono'];
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn | Mi perfil</title>

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
    <link rel="shortcut icon" href="images/ico/sillon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script type="text/javascript">
		function preguntaEliminarCuenta(){
			if (confirm('¿Esta seguro que desea eliminar la cuenta?')){
				window.location.href = "insertar.php?opcion=eliminarCuenta&cuenta=<?php echo $idVisitante ?>";
			}			
		}
	</script>
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
					<img src="imagenUsuario.php?id= <?php echo $idVisitante ?>" class="img-circle" width="150" height="150" />
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
						$bus= "select AVG(valoracion) as puntuacion from valoracion_usuario where id_huesped = '$idVisitante'";
						$res= busqueda($bus);
						if ($res[0]['puntuacion'] > 0){
								echo "<strong>Puntuacion: </strong>".number_format($res[0]['puntuacion'],2);
				?>
								<form method="POST" action='listado_puntuacionesUs.php'>
									<div class="center">
										<input type="hidden" name="idU" id="idU" value="<?php echo $idVisitante; ?>">
										
										<input class="btn btn-primary btn-md" id="valoracion" name="valoracion" type="submit" value="ver todas las calificaciones"/>
									</div>
						</form>
				<?php
						}else{
							echo "<strong>Puntuacion:</strong><p>El usuario no posee calificaciones</p>";
						}
				?>
					<?php
					if($_SESSION['idU'] == $idVisitante){	
						echo '
							<input class="btn btn-primary btn-lg" id="EliminarCuenta" name="EliminarCuenta" type="button" value="Eliminar cuenta" onClick="preguntaEliminarCuenta()"/>
							<input class="btn btn-primary btn-lg" id="modificarMisDatos" name="modificarMisDatos" type="button" value="Modificar mis datos" onClick="location.href = \'modificar_datosU.php?mail=', $email, '\'"/>
							<br>';
					}
					?>
			</div>
		</div>
	</section>
	<section id="listados">
		<div class="center" id="listados">
	<?php 
		if($_SESSION['idU'] == $idVisitante){	
			echo '
			<h2>Mis publicaciones </h2>
			<hr/>';
			include_once('listado.php');  //******* incluyo las publicaciones
		}
		else {
			echo '
			<h2>Comentarios y valoración como huesped</h2>
			<hr/>
			Incluir aca comentarios y valoración del usuario como huesped
			';			
		}
		?>
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
