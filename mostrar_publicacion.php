<?php
	// cargar a git todas las modificaciones desde las 21.30
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();
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
   
	<link rel="stylesheet" href="css/smoothness/jquery-ui.css">
	<script src="js/jquery.js"></script>	
    <script src="js/bootstrap.min.js"></script>

	
	
	

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


       <div class="right" id="publicacion">

		<?php
			$id = $_REQUEST['id'];
			$consulta = "select * from publicaciones where id_publicacion = '$id'";
			$result= mysql_query($consulta,$con);

			$fila= mysql_fetch_array($result);
			$fechaDesde= $fila['disp_desde'];
			$fechaHasta= $fila['disp_hasta'];
			$idProv= $fila['id_provincia'];
			$idLoc= $fila['id_localidad'];
			$capacidad= $fila['capacidad'];
			$usu= $fila['id_usuario'];
			$est= $fila['estado']; // lleva el estado de la publicacion [eliminada, activo, pausado]

			$consulta2 = "select * from lista_provincias where id = '$idProv'";
			$result2= mysql_query($consulta2,$con);
			$fila2= mysql_fetch_array($result2);

			$consulta3 = "select * from lista_localidades where id = '$idLoc'";
			$result3= mysql_query($consulta3,$con);
			$fila3= mysql_fetch_array($result3);

			$consulta4 = "select * from usuarios where id_usuario = '$usu'";
			$result4= mysql_query($consulta4,$con);
			$fila4= mysql_fetch_array($result4);

			$mail= $fila4['email'];

		?>
	</div>

	<section id="blog" class="container">
        <div class="center">
            <h2><?php echo htmlentities($fila['titulo']); ?></h2><!--titulo-->

        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item"><!--fotos + carrusel + descripcion-->
                        <?php echo "<img class='img-responsive img-blog' src='imagen.php?id=$id' id='imagenPub' />"; ?>
						<div class="center" id="fotoPub">
						<div class="row">
						<?php
							$consul= "select id_imagen from imagenes where id_publicacion = $id";
							$resul= mysql_query($consul,$con);

							while ($fils = mysql_fetch_array($resul)) {
								$id1 = $fils['id_imagen'];

								echo "<div class='col-sm-3' id='imagenRow'>";
								echo "<a href='#' title='Couchinn'><img class='thumbnail img-responsive>' src='imagenes.php?id=$id1'  /></a>"; //NO ANDA LSDKWJERKL3QJWHGFADJK2QDHI
								echo "</div>";
							}
						?>
							</div>
							</div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5 text-center">
                                    <div class="entry-meta">
                                        <strong>Disponible Desde:</strong> <?php echo htmlentities($fechaDesde); ?>
										<br><strong>Disponible Hasta:</strong> <?php echo htmlentities($fechaHasta); ?>
										<br><strong>Capacidad:</strong> <?php echo htmlentities($capacidad); ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 blog-content">
									<div class="post-tags">
                                        <?php echo "<h4>Ubicado en: </h4><p>".htmlentities($fila2['provincia']).", ".htmlentities($fila3['localidad'])."</p>"; ?>
                                    </div>
									<div class="descripcion1">
										<h2>Descripcion</h2>
										<p> <?php echo htmlentities($fila['descripcion']); ?> </p>
									</div>

                                </div>
                            </div>
							<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">×</button>
											<h3 class="fotoMod modal-title">Heading</h3>
										</div>
										<div class="foto modal-body">

										</div>
										<div class="modal-footer">
											<button class="btn btn-default" data-dismiss="modal">Cerrar</button>
										</div>
									</div>
								</div>
							</div>
                    </div><!--/.blog-item-->


				</div><!--/.col-md-8-->
				<aside class="col-md-4">
					<div class="widget categories"> <!--datos de usuario-->
						<?php if ($fila4['tipo_foto'] == null){
						echo "<img class='img-circle imagen_perfil' src='images/foto-de-perfil.png' width='150' height='150'/><br><br>";
					}else{ ?>
						<img class='img-circle imagen_perfil' src='imagenUsuario.php?id= <?php echo $usu ?> 'width="150" height="150" /><br><br>
						<?php } ?>
						
						<a href="ver_perfil_publicacion.php?id=<?php echo $id?>"><strong> <?php echo htmlentities($fila4['apellido']).", ".htmlentities($fila4['nombre'])."</p>"; ?></strong></a>
					</div>
					<div class="widget categories"> <!--puntuaciones usuario/publicacion-->
						<h3>Puntuaciones</h3>
						<div class="row">
							<div class="col-sm-12">
								<div class="single_comments">
									<p>Aqui va a estar la puntuacion del usuario </p>
								</div>
								<div class="single_comments">
									<p>Aqui va a estar la puntuacion de la publicacion </p>
								</div>
							</div>
						</div>
					</div><!--/.recent comments-->
				</aside>
		    </div><!--/.row-->
		</div><!--/.blog-->
				<hr>
				<h3 class="center"><strong>Opciones de la publicacion</strong></h3>
				<fieldset>
					<?php
						include_once('opciones_publicacion.php');
					?>
				</fieldset>
				<hr>
 <!-- ######################################## Comentarios ############################### -->
                        <?php

							//---Incluimos los comentarios
							include_once('comentarios.php');

						?>
				<hr>
<!-- ######################################### /comentarios ############################## -->
    </section><!--/section-->

	<hr/>


	<br>
	<!-- /contenido -->
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
	
	
	<script src="js/jquery-ui.js"></script> 
	<script src="js/validar.js"></script> 
	<script language="javascript">
		$('.thumbnail').click(function(){
			$('.foto').empty();
			var title = $(this).parent('a').attr("title");
			$('.fotoMod').html(title);
			$($(this).parents('div').html()).appendTo('.foto');
			$('#myModal').modal({show:true});
		});
	</script>
	
	<script>
		$(function() {
			$( "#datepicker, #datepicker2" ).datepicker({
				showOn: "button",
				buttonImage: "images/calender_green_16.png",
				buttonImageOnly: true,
				buttonText: "Select date"
			});
			$( "#datepicker, #datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		});
	</script>
	<!-- Footer -->
	<?php

			//---Incluimos el footer
			include_once('view/footer.php');

	?>

    
	
</body>
</html>
