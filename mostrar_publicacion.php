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
	
	<section>
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
                        <?php echo "<img class='img-responsive img-blog' src='imagen.php?id=$id' width='100%' alt='' />"; ?>
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <strong>Disponible Desde:</strong> <?php echo htmlentities($fechaDesde); ?>
										<strong>Disponible Hasta:</strong> <?php echo htmlentities($fechaHasta); ?>
										<strong>Capacidad:</strong> <?php echo htmlentities($capacidad); ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
									<div class="post-tags">
                                        <?php echo "<h4>Ubicado en: </h4><p>".htmlentities($fila2['provincia']).", ".htmlentities($fila3['localidad'])."</p>"; ?>
                                    </div>
                                    <h2>Descripcion</h2>
                                    <p> <?php echo htmlentities($fila['descripcion']); ?> </p>

                                    
                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                                               
                        <h1 id="comments_title">Ejemplos de comentarios y sus respuestas</h1> <!--preguntas/comentarios-->
                        <div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="images/blog/girl.png" class="img-circle" alt="" /></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3>Usuario 1</h3>
                                
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                <a href="#">Responder</a>
                            </div>
                        </div> 
                        <div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="images/blog/boy2.png" class="img-circle" alt="" /></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3>otro usuario</h3>
                                
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                <a href="#">Responder</a>
                            </div>
                        </div> 
                        <div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="images/blog/boy3.png" class="img-circle" alt="" /></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3>Soy un usuario</h3>
                                
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                <a href="#">Responder</a>
                            </div>
                        </div> 


                        <div id="contact-page clearfix"><!--reemplazar por textarea para dejar mensaje-->
                            <div class="status alert alert-success" style="display: none"></div>
                            <div class="message_heading">
                                <h4>Aqui se van a poder dejar las preguntas</h4>
                                
                            </div> 
      
                            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                                <div class="row">
                                    
                                    <div class="col-sm-7">                        
                                        <div class="form-group">
                                            <label>Deja tu pregunta</label>
                                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                                        </div>                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg" required="required">Enviar Pregunta</button>
                                        </div>
                                    </div>
                                </div>
                            </form>     
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->

                <aside class="col-md-4">
                    <div class="widget categories"> <!--datos de usuario-->
						<img class='imagen_perfil' src='images/foto-de-perfil.png' /><br><br>
                       <a href="perfil.php?mail=<?=$mail?>"><strong> <?php echo htmlentities($fila4['apellido']).", ".htmlentities($fila4['nombre'])."</p>"; ?></strong></a>
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