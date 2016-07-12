
<?php
if(isset($_SESSION['loggedin']))
{
	if ($_SESSION['idU'] == $usu)
	{
  ?>
    <form action="listado_reservas.php" method="post">
			<input class="" type="hidden" id="id" name="id" value="<?php echo $id;?>">
      <label for="reservas"></label>
      <input class="btn btn-primary btn-lg" type="submit" name="reservas" value="ver reservas"/>
    </form>
  <?php
  }
  else
  {
			$id = $_REQUEST['id'];
    ?>
    <form action="insertar.php?opcion=reserva" method="post" onsubmit="return validaFechas(this)">
		<div class="form-group">
			<br><strong>Reservar:</strong><br><br>
			<label for="fecha">Desde:</label>
			<input class="" type="text" id="datepicker" name="fechaDesde" placeholder="Ingrese la fecha desde" readonly>
		</div>
		<div class="form-group">
			<input class="" type="hidden" id="idPub" name="idPub" value="<?php echo $id;?>">
			<label for="fecha">Hasta:</label>
			<input class="" type="text" id="datepicker2" name="fechaHasta" placeholder="Ingrese la fecha hasta" readonly>
		</div>

		<label for="reservar"></label>
		<input class="btn btn-primary btn-lg" type="submit" name="reservar" value="Aceptar"/>
	</form>
    <?php
    }
 }
    ?>
