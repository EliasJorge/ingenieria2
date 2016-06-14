<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
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

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
				<li data-target="#main-slider" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
				<div class="item active" style="background-image: url(images/sam_4151.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Bienvenidos a couchinn!</h1>
                                    <h2 class="animation animated-item-2">Un lugar que te permitira conocer el pais de forma diferente.</h2>
                                  <!--  <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                                </div>
                            </div>

                           <!-- <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" class="img-responsive">
                                </div>
                            </div>-->

                        </div>
                    </div>
                </div><!--/.item-->

                <?php	
					
					$consulta = "select * from publicaciones where estado = 'activo' order by id_publicacion desc limit 0,3";
					$result= mysql_query($consulta,$con);
					while ($fila = mysql_fetch_assoc($result)) {
						$array[] = $fila;
					}
					foreach ($array as $a)	{
			
						$id= $a['id_publicacion'];
						$fechaDesde= $a['disp_desde'];
						$fechaHasta= $a['disp_hasta'];
						$idProv= $a['id_provincia'];
						$idLoc= $a['id_localidad'];
						$capacidad= $a['capacidad'];
			
						$consulta2 = "select * from lista_provincias where id = '$idProv'";
						$result2= mysql_query($consulta2,$con);
						$fila2= mysql_fetch_array($result2);
			
						$consulta3 = "select * from lista_localidades where id = '$idLoc'";
						$result3= mysql_query($consulta3,$con);
						$fila3= mysql_fetch_array($result3);
			
						echo " <div class='item' style='background-image: url(imagen.php?id=$id)'>";
							echo   "<div class='container'>";				
								echo "<div class='row slide-margin'>";
									echo "<div class='col-sm-6'>";
										echo "<div class='carousel-content'>";
											echo "<h1 class='animation animated-item-1'>".htmlentities($a['titulo'])."</h1>";
											echo "<h2 class='animation animated-item-2'>".htmlentities($fila2['provincia']).", ".htmlentities($fila3['localidad'])."</h2>";
											echo "<a class='btn-slide animation animated-item-3' href='mostrar_publicacion.php?id=$id'>Ver Publicación</a>";
										echo "</div>";
									echo "</div>";
								echo "<!-- <div class='col-sm-6 hidden-xs animation animated-item-4'>";
								echo "<div class='slider-img'>";
                                    echo "<img src='images/slider/img1.png' class='img-responsive'>";
                                echo "</div>";
                            echo "</div>-->";

                        echo "</div>";
                    echo "</div>";
                echo "</div><!--/.item-->";
	}
			
?>
				
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->
	    
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