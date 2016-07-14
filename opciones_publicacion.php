<script type="text/javascript">
	function confirmarPausar (){
		if (confirm('¿Esta seguro que desea pausar la publicacion?')){
			window.location.href = "insertar.php?opcion=pausarPublicacion&publicacion=<?php echo $id ?>";
		}
	}
	function confirmarActivar(){
		if (confirm('¿Esta seguro que desea volver a activar la publicacion?')){
			window.location.href = "insertar.php?opcion=activarPublicacion&publicacion=<?php echo $id ?>";
		}
	}
	function compartirEnRedes(pepe){
		var redes = document.getElementById("redes").selectedIndex;
		if(redes == null || redes == 0){
			alert('Debe seleccionar una rede social.');
			pepe.setAttribute("data-dismiss", ""); // cerrar modal agregando valor al atributo data-dismiss
			return false;
		}else {
			alert('La publicacion se compartio en: ' + document.getElementById("redes").value);
			document.getElementById("redes").selectedIndex = 0;
			pepe.setAttribute("data-dismiss", "modal"); // cerrar modal agregando valor al atributo data-dismiss
			return true;
		}
	}
</script>
<?php
include 'compartir_enredes.html'; 
function reportado($publicacion){
	$link = conectar1();
	$consul = "select * from reportes where id_publicacion = '$publicacion'";
	$resulta = mysql_query($consul,$link);
	if(mysql_affected_rows($link) > 0)
		return true;
	else return false;
}
echo '
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#compartir">Compartir en redes</button>
	';
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
 else echo '
			<div class="derecha">
				<label for"login" size="5">Inicia secion para acceder a mas opciones:</label>
				<input class="btn btn-primary btn-lg" type="button" id="login" value="Iniciar sesion" onclick="window.location.href= \'login.php\'"/>
			</div>
			';