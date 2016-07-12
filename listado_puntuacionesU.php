<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
	include 'funciones.php';
	
	if(isset($_REQUEST['idU']) and !empty($_REQUEST['idU'])){
			$id=$_REQUEST['idU'];
		}
	if(isset($_REQUEST['idPub']) and !empty($_REQUEST['idPub'])){
			$pub=$_REQUEST['idPub'];
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
	<script src="js/validar.js"></script> 
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
	
	<section id="blog" class="container">
		<div>
       <?php 	
				$bus= "select * from valoracion_usuario where id_huesped = '$id' order by id_valoracion";
				$res= busqueda($bus);
				foreach ($res as $r){
					$usu= $r['id_host'];
					$con = "select * from usuarios where id_usuario = '$usu'";
					$fil2= busqueda($con);
									
						?>
									<div class="media comment_section">
										<div class="pull-left post_comments">
											<?php 	if ($fil2[0]['tipo_foto'] == null){
														echo "<img class='img-circle' src='images/foto-de-perfil.png' width='100' height='100'/>";
													}else{ 
											?>
														<img src="imagenUsuario.php?id= <?php echo $usu ?>" class="img-circle" width="100" height="100" />
											<?php } ?>
										</div>
										<div class="media-body post_reply_comments">
											<strong><h2><?php  echo htmlentities($fil2[0]['apellido']).", ".htmlentities($fil2[0]['nombre'])."</h2>"; ?></strong>
											<p> Puntuacion: <?php echo number_format($r['valoracion'],2) ?> </p>
											<p><?php echo htmlentities($r['comentario']); ?></p>
										</div>
									</div>
					
<?php				}
	   ?>
			<div class="botonPub">	
				<input class="btn btn-primary btn-lg" id="regresar" name="regresar" type="button" value="volver" onClick="location.href = 'ver_perfil_publicacion.php?id=<?php echo $pub ?>'"/>
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