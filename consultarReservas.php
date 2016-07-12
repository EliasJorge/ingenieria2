<?php
		session_start();
		include 'funciones.php';
    $idU=$_SESSION['idU'];
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
		<div>
		<?php
			$consulta = "SELECT * FROM reservas WHERE estado = 'activo' AND id_usuario='$idU'";
			//ademas de esto deben ser solo de la publicacion seleccionada
			$resultado = busqueda($consulta);
			if($resultado){?>
  			<table class="table table hover">
  							<tr>
  								<th>Publicacion</th>
								<th>Reservado:</th>
								<th>Desde</th>
								<th>Hasta</th>
  								<th>Estado</th>
								<th></th>
  							</tr>
						<?php
						foreach ($resultado as $r)
						{?>
							<tr><?php
							$fechaDesde= $r['fecha_desde'];
							$fechaHasta= $r['fecha_hasta'];
							$est= $r['estado'];
							$idR=$r['id_reserva'];
							$idP= $r['id_publicacion'];
							$sql="SELECT  * FROM publicaciones WHERE id_publicacion='$idP'";
							$result2= busqueda($sql);
							foreach($result2 as $array)
							{
								echo "<td><br><a>$array[titulo]</a></td>";
								echo "<td><br><a></a></td>";
								echo "<td><br><a>$fechaDesde</a></td>";
								echo "<td><br><a>$fechaHasta</a></td>";
								echo "<td><br><a>$est</a></td>";
							}?>
								<td>
									<div>
										<br>
										<form action="insertar.php?opcion=cancelr" method="post">
											<input class="" type="hidden" id="idR" name="idR" value="<?php echo $idR;?>">
											<input class="btn btn-primary btn-lg" type="submit" value="Cancelar Reserva">
										</form>
									</div>
								</td>
							</tr>
				<?php 	}
			}else{
						echo '<script type="text/javascript">
							alert ("Aun no realizo reservas");
							window.location="index.php"
							</script>';
					}?>
			</table>
			<hr/>

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
