<?php
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
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo open.php
	$con = conectar1();	
	$consulta2=mysql_query("SELECT * FROM tipo_alojamiento");
	mysql_close($con);

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
		<title>crear publicacion</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<link rel="stylesheet" type="text/css" href="css/select_dependientes.css">
		
		<script type="text/javascript" src="js/select_dependientes.js"></script>
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

<body>

	<div class="bg3">
	<h4>Publica tu couch </h4>
	<fieldset>
		<legend>
			<h4>Cual es tu direccion? </h4>
		</legend>
		<form action="insertar.php?opcion=publicacion" method="POST" name="publicacion">
		<div id="demo" style="width:600px;">
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
			<h4 class="palabras">Titulo:</h4><input class="caja" name="titulo" type="text" size="60" maxlength="60" /> <br/>
			<h4 class="palabras">Descripcion:</h4><textarea class="caja" name="descripcion"  cols="60" rows="14"></textarea><br/>
			<br/>
			<label>Tipo de hospedaje: 	<!-- </label	><SELECT NAME= "alojamiento"> 
										<OPTION VALUE=0>Alojamiento:</OPTION> 
										//	<?//=$opcion_alojamiento?> 
										</SELECT> -->
										<?php generaTipoHospedaje(); ?>
			<label> Cantidad de huespedes:</label>
				<SELECT NAME= 'huespedes'>
					<OPTION VALUE=0></option>
					<OPTION VALUE=1>1</option>
					<OPTION VALUE=2>2</option>
					<OPTION VALUE=3>3</option>
					<OPTION VALUE=4>4</option>
					<OPTION VALUE=5>5 </option>			
				</SELECT> 
			<br><br>
			Disponible desde: <input type="date" name="fechaDesde" id="datepicker" size="10" />
			Disponible hasta: <input type="date" name="fechaHasta" id="datepicker" size="10" />
			<br>
			<input id="enviar1" name="siguiente" type="submit" value="siguiente" />
		</fieldset>
    </form>
    </div>
</body>
</html> 