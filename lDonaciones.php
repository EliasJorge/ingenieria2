<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
	if(!isset($_SESSION['loggedin'])) 
	{
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
    <title>Couch Inn | Donaciones</title>
	
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
    <link rel="shortcut icon" href="images/ico/sillon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
		
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
			<div class="center">
				<?php
					if(isset($_REQUEST['fechaInicio'])){
						$fechaInicio = $_REQUEST['fechaInicio'];
						$fechaFin = $_REQUEST['fechaFin'];
						echo
							'<p>
								<font size="5">
									<strong>Donaciones para las fecha inicio: ' . $_REQUEST['fechaInicio'] . '<br>
										 y la fecha fin: ' . $_REQUEST['fechaFin'] . '
									</strong>
								</font>
							</p>
							<br><br>';
						echo '<table class="table">'; //inicio de tabla						
						/* consulta sql de donde saco los datos */
						$query="SELECT * FROM `donaciones` WHERE fecha_donacion BETWEEN '{$fechaInicio}' AND '{$fechaFin}'";
						$registro = mysql_query($query,$con); /* envio la consulta a la BBDD */
						if(mysql_num_rows($registro) == 0) echo 'No hay donaciones para las fechas indicadas';
						else echo
						//<!-- encabezado de la tabla y la fila0 ---> 
						'
						<tr>
						<td><b>#</b></td><!-- columna1  --->
						<td><b>usuario</b></td><!-- columna2  --->
						<td><b>monto</b></td><!-- columna3  --->
						<td><b>fecha donacion</b></td><!-- columna4  --->
						</tr>						
						';
						$numero=1; //numero de filas que voy imprimiendo
						while($row=mysql_fetch_array($registro))// por c/ fila devuelta en la consulta
						{ 
							echo "<tr>"; // abro una nueva fila
							echo " <td>" . $numero . "</td>"; // imprimo numero de fila
							echo "<td>" . $row["id_usuario"] . "</td>"; // imprimo el valor correspondiente a columna1 fila $numero
							echo "<td>" . $row["monto"] . "</td>";	// imprimo el valor correspondiente a columna2 fila $numero
							echo "<td>" . $row["fecha_donacion"] . "</td>"; // imprimo el valor correspondiente a columna3 fila $numero
							echo "</tr>"; // cierro la fila
							$numero++; // incremento numero de filas hechas
						}
						echo '</table><hr>';// Fin de tabla
						echo '
							<div>
								<input class="btn btn-primary btn-lg" id="volver" name="volver" type="button" value="Hacer otra Busqueda" onClick="location.href = \'iDonaciones.php\' "/>
							</div>';					
						mysql_free_result($registro);
						mysql_close($con);
					}
					else echo 
							'<script type="text/javascript">
								alert("No puede acceder por aca, intente por la siguiente pagina");
								window.location="iDonaciones.php"
							</script>';
				?>
			</div>
		</section><!--/#main-slider-->
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