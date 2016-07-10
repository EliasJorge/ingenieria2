<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();	
	include 'funciones.php';
		if(!isset($_SESSION['loggedin'])) 
			{
				echo '<script type="text/javascript">
					alert("no esta autorizado para ver esta seccion");
					window.location="index.php"
				</script>';							
			}
	if(isset($_REQUEST['id']) and !empty($_REQUEST['id'])){
			$id=$_REQUEST['id'];
		}
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
	

	// Voy imprimiendo el select compuesto por los tipos de alojamiento
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
	
</head><!--/head-->

<body class="homepage">

    <header id="header">
        
		<?php
		
			//---Incluimos la barra superior
			include_once('view/topBar.php');
			
			//---Incluimos el nav
			include_once('view/navBar.php');
			
			//---Buscamos los datos de la publicacion a modificar
			$con3="SELECT * FROM `publicaciones` WHERE id_publicacion= '$id'";
			$pub=busqueda($con3);

		?>
		
    </header><!--/header-->
	
	<!-- Contenido de la pagina -->
	
	<section>
	<?php
		foreach($pub as $p){?>
			<div class="main">
				<div class="center">
					<h2>Modifica tu couch </h2>
					<fieldset>
						<legend>
							<h4>Modifica la ubicacion </h4>
						</legend>
						<form action="modificar_publicacion.php" method="POST" onsubmit=" return validarCouch(this)" name="modificaPub" enctype="multipart/form-data">
							<div class="dependientes" id="demo" style="width:700px;">
								<div id="demoDer">
									<label for="localidad">*Localidad:</label>
									<select class="" id="localidades" name="localidades">
					
										<option value="0">Selecciona opcion</option>
											<?php
												$cons="SELECT * FROM `lista_localidades` WHERE relacion ='$p[id_provincia]'";
												$loc=busqueda($cons);
												if(!empty($loc)){
													foreach($loc as $l){
														if($l['id']==$p['id_localidad']){
															echo "<option value=".$l['id']." selected>".$l['localidad']."</option>";
														}
														else{
															echo "<option value=".$l['id'].">".$l['localidad']."</option>";
														}
													}
												}
											?>
									</select>
								</div>
								<div id="demoIzq">
									<label for="localidad">*Provincia:</label>
									<select class="" id="provincias" name="provincias" onChange='cargaContenido(this.id)'>
									<?php
										$co1="SELECT * FROM `lista_provincias`";
										$prov=busqueda($co1);
									?>
										<option value="0">elige</option>
									<?php
											if(!empty($prov)){
												foreach($prov as $pv){
													if($pv['id']==$p['id_provincia']){
														echo "<option value=".$pv['id']." selected>".$pv['provincia']."</option>";
													}else{
														echo "<option value=".$pv['id'].">".$pv['provincia']."</option>";
													}
												}
											}		
		
									?>
									</select>
								</div>
							</div><br/>
					</fieldset>
					<fieldset>
						<legend>
							<h4>Modifica los datos acerca del lugar </h4>
						</legend>
						<div class="col-sm-5 col-sm-offset-1">
							<h4 class="palabras">*Titulo:</h4><textarea id="titulo" name="titulo" rows="1" cols="60" ><?php echo $p['titulo'];?></textarea> <br/>
							<h4 class="palabras">*Descripcion:</h4><textarea class="caja" name="descripcion" id="descrip" cols="60" rows="14"><?php echo $p['descripcion'];?></textarea><br/>
							<br/>
						</div>
						<div class="col-sm-5" id="columnaa">
							<label>Tipo de hospedaje: 	</label>
							<select class="" id="alojamiento" name="alojamiento">
								<option value=''>Elige</option>
								<?php
									$co="SELECT * FROM `tipo_alojamiento` ";
									$tipo=busqueda($co);							
									foreach ($tipo as $t) {
										if($t['id_talojamiento'] == $p['id_talojamiento']){
											echo "<option value=".$t['id_talojamiento']." selected>".$t['nombre']."</option>";
										}
										else{
											echo "<option value=".$t['id_talojamiento']." >".$t['nombre']."</option>";
										}
									}
								?>
							</select><br>
							<br>
							<div class="form-group">
								<label> *Cantidad de huespedes:</label>
								<input class="caja" name="huespedes" id="capacidad" type="number" size="30" maxlength="30" value=<?php echo $p['capacidad'];?> /> 
								<br><br>
							</div>
					
						<div class="izquierda">
								<div class="form-group">
									<label for="fecha">*Disponible desde:</label>
									<input class="" type="text" id="datepicker" name="fechaDesde" placeholder="<?php echo $p['disp_desde'];?>" readonly>
								</div>
								<div class="form-group">
									<label for="fecha">*Disponible hasta:</label>
									<input class="" type="text" id="datepicker2" name="fechaHasta" placeholder="<?php echo $p['disp_hasta'];?>"  readonly>
								</div>
						</div>
				
							
							<br>
							<input type="hidden" name="idPub" id="idPub" value="<?php echo $id; ?>">
							<input class="btn btn-primary btn-lg" id="enviar1" name="modificar" type="button" value="modificar" onClick="preguntaModificar()"/>
							<input class="btn btn-primary btn-lg" id="enviar2" name="cancelar" type="button" value="cancelar" onClick="location.href = 'index.php'"/>
						</div>
					</fieldset>
						</form>
					
					<fieldset>
						<div class="center">
						<legend>
							<h4>Administra las fotos del couch </h4>
						</legend>
				
				<!-- Large modal -->
					
					<button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Añade Fotos</button>
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">Sube fotos de tu couch:</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<form action="subirFotos.php" method="POST" onsubmit=" return validarCouch(this)" id="subeFotos" name="subeFotos" enctype="multipart/form-data">
											<div class="center" id="subeFotos">
												<input type="file" name="imagen[]" id="foto1" value="" multiple>
												<input type="hidden" name="idPub" id="idPub" value="<?php echo $id; ?>">
											</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-primary btn-md" onClick="preguntaFotoMod()">Subir</button>
								</div>
										</form>
							</div>
						</div>
					</div>
					<button class="btn btn-primary" data-toggle="modal" data-target=".eliminaFotos">Elimina Fotos</button>
					<div class="modal fade eliminaFotos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel2">Sube fotos de tu couch:</h4>
								</div>
								<div class="modal-body">
									<form action="eliminarFotos.php" method="POST" onsubmit=" return validarCouch(this)" id="eliminaFotos" name="eliminaFotos" enctype="multipart/form-data">
									<table>
									<tr>
									<div class="center">
									<?php
										$consul= "select id_imagen from imagenes where id_publicacion = $id";
										 
										$fot = busqueda($consul);
										if(!empty($fot)){
												$i=0;
												$j=3;
												foreach($fot as $f){
													$id1 = $f['id_imagen'];
													
													echo "<div class='col-sm-3' id=''>";
													if ($i == $j){
														echo "</tr>";
														echo "<tr>";
														$j = $j + 3;
													}
													echo "<td><input type='checkbox' name='fotos[]' value='$id1' /></td><td><img id='imagen_lista' class='thumbnail img-responsive>' src='imagenes.php?id=$id1'  /></td>"; 
													$i++;
													echo "</div>";
													
												}
										}	
									
									?>
									<input type="hidden" name="idPub" id="idPub" value="<?php echo $id; ?>">
									</div>
									</tr>
									</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cerrar</button>
									<button type="button" class="btn btn-primary btn-md" onClick="preguntaFotoElim()">Eliminar</button>
								</div>
										</form>
							</div>
						</div>
					</div>
					</div>
					</fieldset>
				</div>
			</div>
	<?php } // cierra el foreach ?>
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