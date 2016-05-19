<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/jquery-1.6.js" ></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>  
		<script type="text/javascript" src="js/Adamina_400.font.js"></script>
		<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
		<script type="text/javascript" src="js/script.js" ></script>
		<script type="text/javascript" src="js/kwicks-1.5.1.pack.js" ></script>
		<script type="text/javascript" src="js/atooltip.jquery.js"></script>
		
		
	</head>
	<body id="page1" >
		<div class="bg1">
			<div class="main">
				<img src="images/logo-couchinn1.png" align="center" />
				<nav>
					
					<ul id="menu">
						<form method="POST" action="buscador.php">
							<label>Destino:</label>
							<input type="text" name="destino" id="destino" size="20" />
							<label> Fecha Inicio:</label>
							<input type="date" name="datepicker" id="datepicker" size="10" />
							<label> Fecha Fin:</label>
							<input type="date" name="datepicker" id="datepicker" size="10" />
							<label> huespedes:</label>
							<SELECT NAME= 'huespedes'>
							<OPTION VALUE=0></option>
							<OPTION VALUE=1>1</option>
							<OPTION VALUE=2>2</option>
							<OPTION VALUE=3>3</option>
							<OPTION VALUE=4>4</option>
							<OPTION VALUE=5>5 </option>			
							</SELECT> 
							<input name='buscar' type='submit' value='buscar' />
						</form>
					</ul>
				</nav> 
				
			</div>
			<div class="main">
				<div class="wrapper">
					<div class="kwicks-wrapper marg_bot1">
						<ul class="kwicks horizontal"> <!-- las imagenes deben tener 640x414px -->
							<li><a href="publicacion.php"><img src="images/bariloche-640x414.jpg" alt=""> </a></li>
							<li><a href="publicacion.php"><img src="images/cafayate-640x414.jpg" alt=""></a></li>
							<li><a href="publicacion.php"><img src="images/mar-del-plata-640x414.jpg" alt=""></a></li>
							<li><a href="publicacion.php"><img src="images/tilcara-640x414.jpg" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
			
		</div>
			<script type="text/javascript"> Cufon.now(); </script>
		
		<script>
				$(document).ready(function(){
					$('.kwicks').kwicks({
						max : 500,
						spacing : 0,
						event : 'mouseover'
					});
							   
				})
		</script>
	</body>
</html 	>