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
$id = $_REQUEST['id'];
if (!$id)	// comprueba que se haya seleccionado un tipo de alojamiento para modificar
{ 	
	header("location:modificar.php?opcion=tipoAlojamiento"); // de no ser asi vuelve al menu de seleccion
}

$consulta= "select * from tipo_alojamiento where id_talojamiento = '$id'";
$resul= mysql_query($consulta);
$fila= mysql_fetch_array($resul);
$id= $fila['id_talojamiento'];
$nombre= $fila['nombre'];

//***************************************************************************************************************


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
       <div class= "center" >
			<form action="modificar_bd.php?opcion=alojamiento&id=<?php echo $id ?>" method="POST" name="alojamiento1">
    	
    	<fieldset>
			<legend>
				<h2>Modificar un nuevo tipo de hospedaje </h2>
			</legend>
			<input class="caja" name="alojamiento" type="text" size="60" maxlength="60"  value="<?php echo $fila['nombre']; ?>"/> <br/>
    	    <input class="btn btn-primary btn-lg" id="button3" name="enviar" type="submit" value="guardar" />
			</form>
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