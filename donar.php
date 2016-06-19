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
    <title>Couch Inn | Donar</title>
	
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
			<script language="JavaScript">
				<!--
				function validarDonacion () 
				{
					var formulario = document.validate;
					var blancos = false;
					for (var i=0; i<formulario.length; i++) {
						if(formulario[i].type =='text') 
						{
							if (formulario[i].value == null || formulario[i].value.length == 0 
															|| /^\s*$/.test(formulario[i].value))
							{
							   //alert (formulario[i].name+ ' no puede estar vacío o contener sólo espacios en blanco');
							   blancos = true;
							   break;
							}
						}
					}
					if ((!blancos) && (validarTarjeta() == true))
					{
						if(!isNaN(formulario.monto.value))
						{
							return true
						}
						else alert("ingrese un valor numerico en el campo monto")						
					}
					else
						if (blancos) alert ('No puede dejar campos vacíos o sólo con espacios en blanco');
						else	alert ("Tarjeta de Credito no Valida!")
				}

				function validarTarjeta () {
				 tarjetaValida = false;
				 ret = stripNonNumbers (document.validate.accountnumber.value);
				 item = document.validate.cardtypelist.selectedIndex;
				 tipoTarjeta = document.validate.cardtypelist.options[item].text;
				 if (tipoTarjeta == "Mastercard") {
				  if (ret.length == 16) 
					 tarjetaValida = true;
				  if ((ret.substring (0, 2) >= "51") && (ret.substring (0, 2) <= "55"))
					 tarjetaValida = true;
				  else
					 tarjetaValida = false;
				 }
				 if (tipoTarjeta == "Visa") {
				   if ((ret.length == 16) || (ret.length ==13))
					  tarjetaValida = true;
				   if (ret.substring (0, 1) != "4")
					  tarjetaValida = false;
				 }
				 if (tipoTarjeta == "American Express") {
				   if (ret.length == 15) 
					  tarjetaValida = true;
				   if ((ret.substring (0, 2) != "34") && (ret.substring (0, 2) != "37"))
					  tarjetaValida = false;
				 }
				 return (tarjetaValida);
				}

				function stripNonNumbers (InString) {
				 OutString="";
				 for (Count=0; Count < InString.length; Count++) {
					 TempChar=InString.substring (Count, Count+1);
					 Strip = false;
					 CharString="0123456789";
					 for (Countx = 0; Countx < CharString.length; Countx++) {
					   StripThis = CharString.substring(Countx, Countx+1)
					   if (TempChar == StripThis) {
						  Strip = true;
						  break;
					   }
					 }
					 if (Strip)
						OutString=OutString+TempChar;
				 }
				 return (OutString);
				}
				//-->
			</script>
			<p>
				<font size="5">
					<strong>Donar<br></strong>
				</font>
			</p>
			<hr>
			<form name="validate" action="insertar.php?opcion=donar" method="POST" onsubmit="return validarDonacion()" enctype="multipart">
				<p>Seleccionar un tipo de Tarjeta:<br>
					<select name="cardtypelist" size="1">
						<option selected value="0">Seleccione tipo de tarjeta....</option>
						<option value="1">American Express</option>
						<option value="2">Visa</option>
						<option value="3">Mastercard</option>
					</select>
				</p>
				<div>
					<p>Ingrese el numero de la tarjeta:<br>
						<input type="text" size="24" name="accountnumber" maxlength="16">
					</p>
					<p>Ingrese el monto a donar:<br>
						<input type="text" name="monto" size="24" placeholder="ej. 20.50">
					</p>
				</div>
				<div>			
					<input class="btn btn-primary btn-lg" type="submit" value="Confirmar"/> 
					<input class="btn btn-primary btn-lg" type="button" value="Cancelar" onClick="location.href = 'index.php'"/> 
				</div>	
			</form>

		</section><!--/#main-slider-->

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