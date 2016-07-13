<?php
		session_start();
		include 'funciones.php';
		$idP=$_REQUEST['id'];
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
		<?php
			$consulta = "SELECT * FROM reservas WHERE estado = 'activo' AND id_publicacion='$idP'";
			//ademas de esto deben ser solo de la publicacion seleccionada
			$resultado = busqueda($consulta);
			if($resultado){
				
				$sql="SELECT  * FROM publicaciones WHERE id_publicacion='$idP'";
				$result2= busqueda($sql);
				
		?>	
				<div class="center">
					<strong>Solicitudes de la publicacion: <?php echo $result2[0]['titulo']; ?></strong> <br>
				</div>
				<br><br>
				<div>
				<table class="table table hover" id="listados">
					<tr>
  						
  						<th>Usuario</th>
  						<th></th>
						<th>Desde</th>
						<th>Hasta</th>
						<th></th>
  					</tr>
			<?php
					foreach ($resultado as $r)
					{?>
						<tr><?php
							$fechaDesde= $r['fecha_desde'];
							$fechaHasta= $r['fecha_hasta'];
							$idR=$r['id_reserva'];
							$idUser= $r['id_usuario'];
							$sql = "SELECT * FROM usuarios WHERE id_usuario='$idUser'";
							$result1 = busqueda($sql);
							
							
							foreach($result1 as $r1)
							{
								echo "<td><br><a href=ver_perfil.php?id=$r1[id_usuario]>$r1[email]</a></td>";
								echo "<td><br><a></a></td>";
								echo "<td><h3> $fechaDesde</h3></td>";
								echo "<td><h3> $fechaHasta</h3></td>";
							}
								
								?>
								<td>
									<div>
										
										<form action="insertar.php?opcion=rechazar" method="post">
											<input class="" type="hidden" id="idR" name="idR" value="<?php echo $idR;?>">
											<input class="" type="hidden" id="idP" name="idP" value="<?php echo $idP;?>">
											<input class="btn btn-primary btn-lg" type="button" value="Aceptar" onclick="location.href = 'aceptar_reserva.php?idR=<?php echo $idR;?>'">
											<input class="btn btn-primary btn-lg" type="submit" value="Rechazar">
										</form>
									</div>
								</td>
							</tr>
							<?php
					}
			}else{?>
							<script type="text/javascript">
							alert ("No hay solicitudes para esta publicacion");
							window.location="mostrar_publicacion.php?id=<?php echo $idP?>"
							</script>';
	<?php				}?>
							<tr>
								<td></td>
								<td></td>
								
								<td></td>
								<td></td>
							<td><div class="botonPub">	
								<input class="btn btn-primary btn-lg" id="regresar" name="regresar" type="button" value="volver a la publicacion" onClick="location.href = 'mostrar_publicacion.php?id=<?php echo $idP ?>'"/>
							</div>
							</td>
							</tr>
						</table>
						</div>
			
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
