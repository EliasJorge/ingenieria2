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