
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
	
	<h1 id="comments_title">Preguntas y comentarios de la publicacion</h1> <!--preguntas/comentarios-->
                       
						<?php 
							$busq = "select * from comentarios where id_publicacion = '$id'";
							$res= mysql_query($busq,$con);
							if(mysql_num_rows($res) > 0){
								
								while ($fila = mysql_fetch_assoc($res)) {
								$row[] = $fila;
								}
								foreach ($row as $r){
									$com = $r['id_comentario'];
									$usua = $r['id_usuario'];
									$busq2 = "select * from usuarios where id_usuario = '$usua'";
									$res2= mysql_query($busq2,$con);
									$fil2= mysql_fetch_array($res2);
						?>
									<div class="media comment_section">
										<div class="pull-left post_comments">
											
											<img src="imagenUsuario.php?id= <?php echo $usua ?>" class="img-circle" width="100" height="100" />
										</div>
										<div class="media-body post_reply_comments">
											<strong><h2><?php  echo htmlentities($fil2['apellido']).", ".htmlentities($fil2['nombre'])."</h2>"; ?></strong>                                
											<p><?php echo htmlentities($r['comentario']); ?></p>
									<?php 	if ($usu == $_SESSION['idU']){ 
												if ($r['respuesta'] == NULL){?>
													
													<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Responder</button>

													<!-- Modal -->
													<div id="myModal" class="modal fade" role="dialog">
														<div class="modal-dialog">

													<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h4 class="modal-title">Responde un Comentario</h4>
																</div>
																<div class="modal-body">
																	<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="insertar.php?opcion=respuesta" role="form">
												                        <div class="">                                          
																			<textarea name="respuesta" id="message" required="required" class="form-control" rows="8"></textarea>
																			<input type="hidden" name="comentario" value="<?php echo $com; ?>">
																			<input type="hidden" name="idPub" value="<?php echo $id; ?>">
																			<button type="submit" class="btn btn-primary btn-lg" required="required">Enviar Respuesta</button>
																			
																		</div>
                                   									</form>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div>
															</div>

														</div>	
													</div>
									<?php 		} else {
										?>		<div class="media-body post_reply_comments1">
												<h2> Respuesta:</h2>
												<p><?php echo htmlentities($r['respuesta']); ?></p>
												</div>
										
											
									<?php	
												}
											} echo "</div>";
								}
							}else {
													echo "<div class='center'> <h3> No hay comentarios todavia </h3> </div>";
							}
							
								
										
									echo "</div>"; 	
										
								 ?>
						<!-- Aqui comienza el area para dejar mensajes -->		
                        <div id="contact-page clearfix">
                            <div class="status alert alert-success" style="display: none"></div>
                            <?php if ($usu != $_SESSION['idU']){ ?>
							<div class="message_heading">
                                <h4>Deja tu pregunta o comentario:</h4>
                            </div> 
						
                            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="insertar.php?opcion=pregunta" role="form">
                                <div class="row">
                                    
                                    <div class="col-sm-12">                        
                                        <div class="">                                          
                                            <textarea name="pregunta" id="message" required="required" class="form-control" rows="8"></textarea>
											<input type="hidden" name="idPub" value="<?php echo $id; ?>">
											<input type="hidden" name="usuId" value="<?php echo $_SESSION['idU']; ?>">
											<button type="submit" class="btn btn-primary btn-lg" required="required">Enviar Pregunta</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
						<?php } ?>
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>