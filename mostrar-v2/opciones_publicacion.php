<?php
if(isset($_SESSION['loggedin']))
{
	if ($_SESSION['idU'] == $usu){
		echo '
	<form action="error.php" method="post">
		<label for="reservas"></label>
		<input class="btn btn-primary btn-lg" type="button" name="reservas" value="Ver reservas"/>
	';
		if ($est != 'eliminada'){
			echo '
					<div class="derecha">
						<input class="btn btn-primary btn-lg" id="Eliminar" name="Eliminar" type="button" value="Eliminar" onClick="location.href = "eliminarPub.php?id=',$id,'"/>
						<input class="btn btn-primary btn-lg" id="Pausar" name="Pausar" type="button" value="Pausar" onClick="location.href = "error.php""/>
						<input class="btn btn-primary btn-lg" id="Modificar" name="Modificar" type="button" value="Modificar" onClick="location.href = "error.php""/>
					</div>
	</form>			
				';
		}
	}
	else{
		echo '
		<form action="error.php" method="post">
			<div>
				<strong>Ingrese las fechas para su viaje:</strong><br><br>
				<label for="fecha">Desde:</label>
				<input class="" type="text" id="datepicker" name="fechaDesde" placeholder="Ingrese la fecha desde" readonly>
			</div>
			<div class="form-group">
				<label for="fecha">Hasta:</label>
				<input class="" type="text" id="datepicker2" name="fechaHasta" placeholder="Ingrese la fecha hasta" readonly>
			</div>
			<label for="Reservar"></label>
			<input class="btn btn-primary btn-lg" type="submit" name="Reservar" value="Reservar"/>
			<input class=" derecha btn btn-primary btn-lg" type="button" name="Reportar" value="Reportar"/>	
		
		</form>
		';
    }
 }echo 'Tenes que registrarte para poder accceder a las opciones';