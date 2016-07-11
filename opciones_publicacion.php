<script type="text/javascript">
	function confirmarPausar (){
		if (confirm('¿Esta seguro que desea pausar la publicacion?')){
			window.location.href = "insertar.php?opcion=pausarPublicacion&publicacion=<?php echo $id ?>";
		}
	}
	function confirmarActivar(){
		if (confirm('¿Esta seguro que desea pausar la publicacion?')){
			window.location.href = "insertar.php?opcion=activarPublicacion&publicacion=<?php echo $id ?>";
		}
	}
</script>
<?php
function reportado($publicacion){
	$link = conectar1();
	$consul = "select * from reportes where id_publicacion = '$publicacion'";
	$resulta = mysql_query($consul,$link);
	if(mysql_affected_rows($link) > 0)
		return true;
	else return false;
}
if(isset($_SESSION['loggedin']))
{
	if ($_SESSION['idU'] == $usu){
		echo '
		<input class="btn btn-primary btn-lg" type="button" name="reservas" value="Ver reservas"/>
	';
		if ($est != 'eliminada'){
			echo '
				<div class="derecha">
					<form class="" name="eliminaPub" id="eliminaPub" method="post" action="eliminarPub.php" onsubmit="return preguntaEliminar()">
						<div class="">
							<input type="hidden" name="pubID" id="pubID" value="', $id, '">
							<input class="btn btn-primary btn-lg" id="eliminar" name="eliminar" type="submit" value="Eliminar"/>';
			if($est == 'activo'){
				echo '		
							<input class="btn btn-primary btn-lg" id="Pausar" name="Pausar" type="button" value="Pausar" onClick="confirmarPausar()"/>
					';
			}
			else echo '
							<input class="btn btn-primary btn-lg" id="Activar" name="Activar" type="button" value="Activar" onClick="confirmarActivar()"/>
						';
			echo '
							<input class="btn btn-primary btn-lg" id="modificar" name="modificar" type="button" value="Modificar" onClick="location.href = \'modificarPub.php?id=', $id, '\'"/>
						</div>
					</form>
				</div>
				';
		}
	}
	else{
		echo '
			<div>
				<strong>Ingrese las fechas para su viaje:</strong><br><br>
				<label for="fecha">Desde:</label>
				<input class="" type="text" id="datepicker" name="fechaDesde" placeholder="Ingrese la fecha desde" readonly>
			</div>
			<div>
				<label for="fecha">Hasta:</label>
				<input class="" type="text" id="datepicker2" name="fechaHasta" placeholder="Ingrese la fecha hasta" readonly>
			</div>
			<label for="Reservar"></label>
			<input class="btn btn-primary btn-lg" type="submit" name="Reservar" value="Reservar"/>';
		/****** codigo reportar ****/
		if(reportado($id))
			echo '
				<input class=" derecha btn btn-primary btn-lg" type="button" disabled="true" value="Reportado">
			';
		else echo '
				<input class=" derecha btn btn-primary btn-lg" type="button" name="Reportar" value="Reportar" onclick="window.location.href= \'reportar.php?id=',$id,'\'"/>
			';
		/******************************/
	}
 }
 else echo 'Tenes que registrarte para poder accceder a las opciones';