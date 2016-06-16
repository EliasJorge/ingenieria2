<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
	include 'funciones.php';

function generaProvincia()
{
	include 'conexion.php';
	conectar();
	$consulta=mysql_query("SELECT id, provincia FROM lista_provincias");
	desconectar();

	// Voy imprimiendo el primer select compuesto por las provincias
	echo "<select name='provincias' id='provincias' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		$registro[1]=htmlentities($registro[1]);
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
function generaTipoHospedaje()
{	
	
	$con1 = conectar1();
	$sql="SELECT * FROM tipo_alojamiento";	
	$consulta2=mysql_query($sql,$con1);
	

	// Voy imprimiendo el primer select compuesto por las provincias
	echo "<select name='alojamiento' id='alojamiento'>";
	echo "<option value='0'>Elige</option>";
	while($registro2=mysql_fetch_row($consulta2))
	{
		$registro2[1]=htmlentities($registro2[1]);
		echo "<option value='".$registro2[0]."'>".$registro2[1]."</option>";
	}
	echo "</select>";
}
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
	<!-- <link rel="stylesheet" type="text/css" href="css/select_dependientes.css">-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="stylesheet" href="css/smoothness/jquery-ui.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery-ui.js"></script> 
	
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
	
	<section>
       <div class="main">
	<div class="center">
	<h2>Publica tu couch </h2>
		<fieldset>
			<legend>
				<h4>Cual es tu direccion? </h4>
			</legend>
			<form action="insertar.php?opcion=publicacion" method="POST" name="publicacion" enctype="multipart/form-data">
			<div class="dependientes" id="demo" style="width:600px;">
				<div id="demoDer">
					<select disabled="disabled" name="localidades" id="localidades">
						<option value="0">Selecciona opci&oacute;n...</option>
					</select>
				</div>
				<div id="demoIzq"><?php generaProvincia(); ?></div>
			</div><br/>
		</fieldset>
		<fieldset>
			<legend>
				<h4>Acerca del lugar </h4>
			</legend>
			<div class="col-sm-5 col-sm-offset-1">
				<h4 class="palabras">Titulo:</h4><input class="caja" name="titulo" type="text" size="60" maxlength="60" /> <br/>
				<h4 class="palabras">Descripcion:</h4><textarea class="caja" name="descripcion"  cols="60" rows="14"></textarea><br/>
				<br/>
			</div>
			<div class="col-sm-5" id="columnaa">
				<label>Tipo de hospedaje: 	<?php generaTipoHospedaje(); ?><br>
				<br>
				<label> Cantidad de huespedes:</label>
				<input class="caja" name="huespedes" type="text" size="30" maxlength="30" /> 
				<br><br>
				<div class="izquierda">
				<div class="form-group">
						<label for="fecha">Disponible desde:</label>
						<input class="" type="text" id="datepicker" name="fechaDesde" placeholder="Ingrese la fecha desde" readonly>
					</div>
					<div class="form-group">
						<label for="fecha">Disponible hasta:</label>
						<input class="" type="text" id="datepicker2" name="fechaHasta" placeholder="Ingrese la fecha hasta" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label> Sube fotos de tu couch: </label>
					<div class="center" id="subeFotos">
							<input type="file" name="imagen[]" value="" multiple>
					</div>
				</div>
			<br>
			<input class="btn btn-primary btn-lg" id="enviar1" name="siguiente" type="submit" value="siguiente" />
			<input class="btn btn-primary btn-lg" id="enviar2" name="cancelar" type="button" value="cancelar" onClick="location.href = 'admin.php'"/>
			</div>
		</fieldset>
    </form>
    </div>
	</div>
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