


<?php
if(isset($_SESSION['loggedin']))
{
	if ($_SESSION['idU'] == $usu)
	{
  ?>
    <form action="error.php" method="post">
      <label for="reservas"></label>
      <input class="btn btn-primary btn-lg" type="submit" name="reservas" value="ver reservas"/>
    </form>
  <?php
  }
  else
  {
    ?>
    <form action="error.php" method="post">
		<div class="form-group">
			<br><strong>Reservar:</strong><br><br>
			<label for="fecha">Desde:</label>
			<input class="" type="text" id="datepicker" name="fechaDesde" placeholder="Ingrese la fecha desde" readonly>
		</div>
		<div class="form-group">
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
