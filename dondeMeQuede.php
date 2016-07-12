<?php
	
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
	
	<section id="" class="center">
        <?php		
			$usuario = $_SESSION['idU'];
			$fecha=date('o-m-d');
			$consulta = "select * from reservas r inner join publicaciones p on (r.id_publicacion = p.id_publicacion) where r.estado = 'aceptado' and r.id_usuario = '$usuario' and r.fecha_hasta < '$fecha'";
			
			$resultado = busqueda($consulta);			
		?>
		<div class="center">
			<table class="table table hover " id="listados">
				<div class="center">
							<tr>
								<th>Fotos</th>
								<th>Titulo</th>
								<th>Valorar</th>
								
							</tr>
				</div>
						<?php
						
						foreach ($resultado as $r){?>
							<tr><?php
								echo "<td><img src=imagen.php?id=$r[id_publicacion] id='imagen_lista' class='img-rounded'></td>";
								echo "<td><br><a href=mostrar_publicacion.php?id=$r[id_publicacion]>$r[titulo]</a></td>";
								$con="SELECT * FROM `valoracion_publicacion` WHERE `id_usuario`='$usuario' AND `id_publicacion`='$r[id_publicacion]' and id_reserva = '$r[id_reserva]'";
								$cal=busqueda($con);
								echo "<td>";
									if(count($cal)==0){?>
										<div class="center">
											<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#respuestaModal">Valorar</button>
											<!-- Modal -->
											<div id="respuestaModal" class="modal fade" role="dialog">
												<div class="modal-dialog">

													<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Valora esta publicacion</h4>
															</div>
															<div class="modal-body">
																<form id="main-contact-form" class="contact-form" name="contact-form" method="post" onsubmit="return validaCalificacion(this)" action="insertar.php?opcion=valoraPub" role="form">
																	<div class="">  
																		<label> Calificacion:</label>
																			<SELECT NAME= 'calificacion' id="calificacion">
																				<OPTION VALUE=0></option>
																				<OPTION VALUE=1>1</option>
																				<OPTION VALUE=2>2</option>
																				<OPTION VALUE=3>3</option>
																				<OPTION VALUE=4>4</option>
																				<OPTION VALUE=5>5 </option>			
																			</SELECT>
																		<br>
																		<label> Comentario:</label>
																		<textarea name="comentario" id="comentario"  class="form-control" rows="8"></textarea>
																		<input type="hidden" name="idRes" value="<?php echo $r['id_reserva']; ?>">
																		<input type="hidden" name="idPub" value="<?php echo $r['id_publicacion']; ?>">
																		<input type="hidden" name="idUsu" value="<?php echo $usuario; ?>">
																	</div>
																
															</div>
															<div class="modal-footer">
																<button type="submit" class="btn btn-primary btn-lg" required="required">Enviar Valoracion</button>
																<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Cerrar</button>
															</div>
															</form>
														</div>
													</div>	
												</div>
											<br>
											
										</div><?php
									}
									else{
										echo "<br>esta publicacion ya fue valorada.";
									}?>
								</td>
								
							</tr>
							<?php
						}?>
						</table>
			<hr/>
	
		</div>       
    </section><!--/#error-->
	
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
	<script src="js/validar.js"></script>
</body>
</html>