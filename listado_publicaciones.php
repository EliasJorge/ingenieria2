<?php
	
		session_start();
		include 'funciones.php';
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
			$consulta = "select * from publicaciones p inner join usuarios u on (p.id_usuario = u.id_usuario) where p.estado = 'activo' order by titulo asc";
			$resultado = busqueda($consulta);			
		?>
			<table class="table table hover">
							<tr>
								<th>Fotos</th>
								<th>Titulo</th>
								<th>Descripcion</th>
								<th></th>
							</tr>
						<?php
						
						foreach ($resultado as $r){?>
							<tr><?php
								
										if(($r['tipo'] == 'premium') or ($r['tipo'] == 'admin')){
											echo "<td><img src=imagen.php?id=$r[id_publicacion] id='imagen_lista' class='img-rounded'></td>";
										}
										else{
								?>
											<td><img src="images/sillon.png" id='imagen_lista' class='img-rounded'></td>
								<?php
											
										}
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