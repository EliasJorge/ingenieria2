<?php	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
	include 'funciones.php';
	if(!isset($_SESSION['loggedin']) || ($_SESSION['tipoUsuario'] != 'admin')){
		echo '<script type="text/javascript">
				alert("no esta autorizado para ver esta seccion");
				window.location="index.php"
			</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn | Couchs aceptados</title>	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="css/select_dependientes.css">-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/sillon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="stylesheet" href="css/smoothness/jquery-ui.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery-ui.js"></script> 
	<script src="js/validar.js"></script> 	
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
	<script>
		$(function() {
			$.datepicker.setDefaults({ 
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				yearRange:"c-80:c",
				defaultDate:"m d y",
                dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
                dayNamesShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
                monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
			});
			$( "#fechaNacimiento" ).datepicker();
		});
	</script>
	<script>
		function validarFechas(){
			var inicio = document.getElementById("datepicker").value;
			var fin = document.getElementById("datepicker2").value;
			if(inicio != ""){
				if(fin != ""){
					if(fin.length > 0){
						if(inicio > fin){
							document.getElementById("donaciones").reset();
							alert('Fecha inicio debe ser una fecha inferior o igual a fecha fin');
							return false;
						}else return true
					}
				}
				else{
					alert('Ingrese fecha fin');
					return false;
				}
			}
			else{
				alert('Ingrese fecha inicio');
				return false;
			}
		}
	</script>
	
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
	
	<section id="main-slider" class="center">
	   <!------agregar fecha inicio y fecha fin---------->
		<p>
			<font size="5">
				<strong>Couchs aceptados<br></strong>
			</font>
			<font size="3">
				<strong>Ingrese las fechas inicio y fin para la busqueda <br></strong>
			</font>
		</p>
		<hr>
		<form action="lAceptadas.php" method="POST" onsubmit="return validarFechas()" id="couchs" name="couchs" enctype="multipart/form-data">
			<div>
				<div>
					<label for="fecha">Fecha inicio:</label>
					<input class="" type="text" id="datepicker" name="fechaInicio" placeholder="ej. AAAA-MM-DD" readonly>
				</div>
				<div >
					<label for="fecha">Fecha fin:</label>
					<input class="" type="text" id="datepicker2" name="fechaFin" placeholder="ej. AAAA-MM-DD" readonly>
				</div>
			</div>
			<div>
				<input class="btn btn-primary btn-lg" id="Buscar" name="Buscar" type="submit" value="Buscar"/>
				<input class="btn btn-primary btn-lg" id="Cancelar" name="Cancelar" type="button" value="Cancelar" onClick="location.href = 'index.php'"/>
			</div>
		</form>
    </section><!--/section-->	
	<!-- /contenido -->	
	<!-- Footer -->
	<?php
		
			//---Incluimos el footer
			include_once('view/footer.php');
			
	?>
	<script type="text/javascript" src="js/select_dependientes.js"></script>  
    <script src="js/bootstrap.min.js"></script>   
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>		
</body>
</html>