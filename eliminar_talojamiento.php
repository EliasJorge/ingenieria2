<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
?>

<?php
			if(!isset($_SESSION['loggedin'])) 
			{
				echo '<script type="text/javascript">
					alert("no esta autorizado para ver esta seccion");
					window.location="index.php"
				</script>';							
			}
?>

<?php 
	
		$consulta="SELECT * FROM tipo_alojamiento order by nombre"; 
		$result=mysql_query($consulta); 

		$opcion=""; 

		while ($fila=mysql_fetch_array($result)) { 

		    $id=$fila["id_talojamiento"]; 
		    $nombre=$fila["nombre"]; 
		    $opcion.="<OPTION VALUE=\"$id\">".$nombre."</option>"; 
		}
	
	mysql_close($con); // se cierra la conexion a la base de datos


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
			<fieldset>
				<legend>
					<h2>Eliminar un tipo de hospedaje </h2>
				</legend>
				<?php
					echo "<form action='eliminar.php' method='POST' name='del'>";
				?>
				<SELECT NAME= "id"> 
					<OPTION VALUE=0>Seleccione... </option>
					<?=$opcion?> 
				</SELECT> 
				<input class="btn btn-primary btn-lg" name="eliminar" type="submit" value="eliminar" />
				</form>
			</fieldset>
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